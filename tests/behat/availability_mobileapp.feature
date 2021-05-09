@availability @availability_mobileapp
Feature: availability_mobileapp
  In order to control student access to activities
  As a teacher
  I need to set Mobile app access conditions which prevent student access

  Background:
    Given the following "courses" exist:
      | fullname | shortname | format | enablecompletion |
      | Course 1 | C1        | topics | 1                |
    And the following "users" exist:
      | username |
      | teacher1 |
      | student1 |
    And the following "course enrolments" exist:
      | user     | course | role           |
      | teacher1 | C1     | editingteacher |
      | student1 | C1     | student        |
    And the following config values are set as admin:
      | enableavailability     | 1 |
      | enablewebservices      | 1 |
      | enablemobilewebservice | 1 |

  Scenario: The mobile availbility should be available
    Given I log in as "admin"
    And I am on homepage
    And I navigate to "Plugins > Availability restrictions > Manage restrictions" in site administration
    And I should see "Restriction by Mobile app access"
