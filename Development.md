# The Design of a Database-Linked Website for NCEA Level 2

Project Name: **GeoSolutions**

Project Author: **Ben Martin**

Assessment Standards: **91892** and **91893**


-------------------------------------------------

# Design, Development and Testing Log

### 16/05/2024

Made the database layout plan for the site.

![DrawSQL db layout](images/db.png)

Will need to run this past my stakeholder for feedback to make sure the database has all the details required


### DATE HERE

Added a staff table to the database

![DrawSQL DB layout V2](images/Drawsql2.png)

added a a staff table to the database layout as will need a way to store all their data and their image.

Made a Flow diagram to display how the users will experience the site and what doing what will lead to.
![FlowV1](images/FlowV1.png)


### DATE HERE

Replace this test with what you are working on

Replace this text with brief notes describing what you worked on, any decisions you made, any changes to designs, etc. Add screenshots / links to other media to illustrate your notes where necessary.

### 21/05/24
![landing page one](images/LP1.png)
first two landing page iterations


### 22/05/24
!sql v1](images/UDDB2.png) 
further updated the database schema to include an image for the service


### 27/05/24

Showed current layout and wireframe to client.

> Needs an about us section on the home page like in iteration two, but i like the single page layout of the first one with the big GeoSolutions front and centre.

Added a completed bookings table so the bookings can be flagged as completed
![sql v2](images/COMP1.png)

then changed it to an enum list so instead of having multiple tables for completed, in progress and unfinished. i can just have one table with an extra slot to contain all that data.

![sql v3](images/COMP2.png)

![landing page i2](images/LP2.png)
Incorporated CLIENT FEEDBACK AND MADE ONE BIG LANDING PAGE WITH ALL INFORMATION ON IT.
will need to wait for extra feedback before progressing.
![consulataions i1](images/con_planner.png)

### 27/05/24
> admin page looks unprofessional with those big words and dotted list, how am i going to access the new stuff page too?<

Took notes on client feedback and made some changes to V1

![iteration 4](images/i4.png)

mainly in adding a better looking list with smoothed bars and a drop down at the edge to ,ove the items around froms section to section as well as to delete them

![Consulataions layout](images/con_planner2.png)
![iteration 5](images/i5.png)

### 10/06/24

Received some excellent client feedback on the current design.
> I like the welcome (home / landing) page – its succinct and includes most of the information needed. An awful lot of people search for us just to find out our phone number of contact email – so it would be great if some contact details were available or linkable from that home page. For the Book a Consultation page – most people who contact us have a project and site in mind and will have a site plan.  Can you add the following fields: site address 
>Upload files: A place where we can ask them to upload a site plan showing the location of the development they’re proposing; or a preliminary design plan
> I’m not sure we would use the ‘consultation tracker’ – we have in-house software for managing job progress, Instead of that, you could possibly have a reviews page?  Or examples page?  Or both?Reviews would be a place where customers can leave reviews.
>Examples – we could upload photos of examples; split into groups
>(a) landslip repairs & slope stabilisation
>(b) subdivisions
>(c) liquefaction assessments etc

![Iteration 2 v4](images/I2v4.png)
Implemented the feedback, by adding the asked fields to the booking page as well as adding a footer to the bottom of the home page where the contract details can be easily found.
also added the asked example phots to the bottom of the services page and a corresponding add example file to the new section section

![Reviews design](images/reviewseg.png)
altered the database to include a reviews table so that we can store reviews
![Db added for reviews](images/reviewsdb.png)

### 10/06/24
received some further feedback on yesterdays iterations
>Contact details are great – put them below About Us and above services, Move reviews to the end please

>That’s all looking great.

![review section at bottom](images/refiewqs_bot.png)

rearranged the layout of the home page to have reviews at bottom and the contact details above the services list

![Alt text](![cleaned up sql](image.png)sqlv4.png)
made some small cleanup changed to the sql so that i did not have redundant columns

The client stated that she is happy with the current design as has no further feedback
>love the colour - nice and earthy goes with our core mantra. earth science is what we do - so lots of greens amd browns are good.
>start coding now :)