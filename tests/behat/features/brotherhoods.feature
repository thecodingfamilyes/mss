Feature: Brotherhood

Scenario: Get an empty brotherhoods collection without failing
	When I request "GET /api/brotherhoods"
	Then I get a "200" response
	And the "data" property is an array

Scenario: Try to find an invalid brotherhood
	When I request "GET /api/brotherhoods/nope"
	Then I get a "404" response

Scenario: Try to create a brotherhood
	Given I have the payload:
		"""
			{
				"name": "hermandad 1",
				"shortname": "hdd1",
				"day": 1
			}
		"""
	When I request "POST /api/brotherhoods"
	Then I get a "200" response
	And the "data" property is an object
	And scope into the "data" property
		And the properties exist:
			"""
			id
			name
			"""
	And reset scope
