<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Exceptions\Handler as ExecHandler;
use Exception;
use Excel;

class FileMgmt
{
	private $client_list_file_name = 'ClientList';

	public function __construct()
	{
		$this->storage_path = storage_path('app/client_files');	
		$this->response = 'success';
	}

	private function check_file_exists($file_name)
	{
		try {
			$exists = file_exists($this->storage_path."/".$file_name);
			if(!$exists) {
				$this->create_file($this->client_list_file_name);
			}
		} catch(Exception $e) {
			Log::critical('File not accessible. Exception is '.$e);
			ExecHandler::render_error_page();
		}
	}

	private function create_file($file_name)
	{
		try {
				Excel::create($file_name, function($excel) {
					$excel->sheet('1', function($sheet) {
						$column_names = [
							'name',
							'gender',
							'dob',
							'phone',
							'email',
							'address',
							'nationality',
							'education',
							'preferred_contact_mode',
							'client_id'
						];
						$sheet->fromArray($column_names, null, 'A1', false, false);
					});
				})->store('csv', $this->storage_path, false);
				Log::info('File created successfully.');
		} catch(Exception $e) {
			Log::critical('File not created. Exception is '.$e);
			ExecHandler::render_error_page();
		}
	}

	public function read($file_name)
	{
		try {
			$this->check_file_exists($file_name);
			$data = Excel::load($this->storage_path."/".$file_name)->get();
			Log::info('Data fetched successfully. Data is '.$data);
			return $data;
		} catch(Exception $e) {
			Log::debug('Data not fetched. Exception is '.$e);
			$this->response = 'error';
			return $this->response;
		}
	}

	public function add_to_file($file_name, $data)
	{
		try {
			$this->check_file_exists($file_name);
			Excel::load($this->storage_path."/".$file_name, function($excel) use($data) {
				$excel->sheet($excel->getActiveSheetIndex(), function($sheet) use($data) {
					$data['client_id'] = $sheet->getHighestRow();
					$sheet->prependRow(2, $data);
				});
			})->store('csv', $this->storage_path, false);
			return $this->response;
		} catch(Exception $e) {
			$this->response = 'error';
			Log::debug('Data not added. Exception is '.$e);
			return $this->response;
		}
	}
}
