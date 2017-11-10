# dashboard
Laravel client information collection app

Task:Things to do
1. Create a form to get
2. Name
3. Gender
4. Phone
5. Email
6. Address
7. Nationality
8. Date of birth
9. Education background
10. Preferred mode of contact (select one from email, phone, none)
11. You can be creative with the fields.
12. Add relevant validation to the form both frontend (js) and backend (php)
13. After form submission, if fields are valid save to a csv file
14. Show all clients pulled in from the CSV as another page
-----
1. Deployed to
   1. Heroku: https://pacific-brushlands-82537.herokuapp.com/
   2. Github: https://github.com/pmohan86/dashboard.git
   
2. When the heroku link is opened
   1. Dashboard index page is opened.
      1. This is the page where client list is displayed
      2. There is a button link to add new client
      3. For detailed view of the client, you may click on any of the names and it would take you to the detailed view page
   2. Dashboard create page
      1. Allows creating new clients
      2. Renders success and error messages on the same page
      3. Link to go back to the dashboard index page

3. External Libraries used:
   1. https://github.com/Maatwebsite/Laravel-Excel - for working with csv files
   2. rollbar/rollbar-laravel for logging

4. Integrations made (basic level only as all of these were new for me to learn and I hardly had 2 days to work on this task due to my health issue):
   1. Rollbar
   2. Docker
   3. Travis CI
   4. Codeclimate
   5. StyleCI
   
5. Yet to do:
   1. Automated testing
   
