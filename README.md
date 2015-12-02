# Recipe-PHP_API
Middle tier and API integration

#System Requirement
  1. Xampp or Wamp
  2. MySql workbench
  3. Maven

#Installation, Configuration and Execution
  1. Download and install Xampp control panel V 3.2.1
    a. Install only SQL and Apache
  2. Download and install MySql workbech (Refer installation intruction in recipe-web-service repo of same organisation)
  3. Download and install Maven as per the instruction given in recipe-web-service repo of same organisation
  4. After proper installation, Copy the content of Recipe-PHP_API in a folder inside htdocs of Xampp
  5. Create data base schema in MySql workbench as per the instruction given in db-schema repo
  6. run web service first as per the instruction given in recipe-web-service repo
  7. Make sure mysql workbench is up and running and you have given proper privledge to the user of web service
    a. you can change the Username and password used in web service by editing "src\main\webapp\WEB-INF\jetty-env.xml" file.
  8. point your browser to localhost/<FOLDER_NAME_GIVEN_IN_STEP_4>/
  9. Open any file from the list which show up.
  10. If you dont see any error then everything is configured properly else check the configuration
