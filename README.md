
## Description
It is a small peace of software, which is able to verify and interpret assortment and product 
information from different sources in different data formats. The amount of data and the exemplary "Product" schema 
is very simplified for the purpose of this coding challenge.

The challenge is to create a modern, maintainable, testable and extendable application, which:
- follows a pragmatic, but clean approach by 
  - building a smart software architecture 
  - e.g. utilizing the right design patterns without over-engineering
- follows best practices 
- can easily be extended to integrate additional sources or data formats
- is fully testable for continuous integration and delivery 


## The Data
In the `/data` folder, you find examples of assortment data in two different formats:
- wholsesaler_a.csv  
provides assortment data in CSV format
- wholsesaler_b.json  
provides assortment data in a JSON format


## The Goal
The goal is an application, which integrates different data formats (see "The Data") and maps those into the target
schema, which you can find in the `swagger.yaml`. This file does not describe a web API, but only defines 
the "Product" schema.

Your application should read the given data files (see "The Data") and return a JSON structure with a list of products 
as defined in the Swagger definition.

## Web API urls
- /json
- /csv
