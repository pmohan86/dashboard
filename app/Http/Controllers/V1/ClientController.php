<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\FileMgmt;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    private $client_list_file_name = 'ClientList.csv';
    private $results_per_page = 15;
    private $flash_messages = [
        'fresh_load'                    => '',
        'generic_error'                 => 'Oops... Something went wrong! Please try again',
        'create_page_invalid_input'     => 'Invalid Input... Please try again with valid input',
        'index_page_new_client_success' => 'New Client created successfully',
    ];
    private $fields_for_display = [
        'name',
        'gender',
        'dob',
        'phone',
        'email',
        'address',
        'nationality',
        'education',
        'preferred_contact_mode',
    ];

    public function __construct(FileMgmt $file_mgmt)
    {
        $this->file_mgmt = $file_mgmt;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $view_data['result'] = $this->file_mgmt->read($this->client_list_file_name);
            $result_count = $view_data['result']->count();
            if ($result_count != 0) {
                $view_data['title'] = $view_data['result'][0]->keys();
            } else {
                $view_data['title'] = $this->fields_for_display;
            }

            $current_page = Paginator::resolveCurrentPage();
            $per_page = 3;
            $currentPageSearchResults = $view_data['result']->slice(($current_page - 1) * $per_page, $per_page)->all();
            $view_data['result'] = new Paginator($currentPageSearchResults, $per_page, $current_page, ['path' => Paginator::resolveCurrentPath()]);
            $view_data['has_more_pages'] = (count($currentPageSearchResults) >= $per_page) ? true : false;

            return view('dashboard_index', $view_data);
        } catch (Exception $e) {
            Log::critical('Index Page. Something went wrong. Exception is '.$e);
            ExecHandler::render_error_page();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            return view('dashboard_create');
        } catch (Exception $e) {
            Log::critical('Create Load Page. Something went wrong. Exception is '.$e);
            ExecHandler::render_error_page();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $data_to_be_added = array_only($input, $this->fields_for_display);
        $this->file_mgmt->add_to_file($this->client_list_file_name, $data_to_be_added);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
