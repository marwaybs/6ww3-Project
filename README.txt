Name: Bhaag Marway
Student Number: 001205155
Course: CS 6WW3

results_sample.html must be opened separately as the submit button in search.html does not submit anywhere as was specified.

Add on task 2 questions:

i. Describe briefly the different versions of graphics provided in step 2(a);
include a sample of HTML code and explain how the different selectors work
together.

The different selectors used in 2(a) allow different images to be selected for different resolutions. In the below html sample, <picture> has a <source> and a <img> tag. The <img> tag outlines the default image to be used and the source tag allows the image to be changed based on different conditions. The <img> tag shows where the default image is with its own "src" attribute. The condition in the source tag in the html below changes the image to a higher resolution image if the resolution of the screen is greater than 900px and specifies where that image is.

<picture class="indexCoffee">
  <!-- An alternative picture for higher resolution displays -->
  <source
    media="(min-width: 900px)"
    srcset="images/coffee2x.png">
    <!-- The default image and its source -->
  <img
    class="indexCoffee"
    src="images/coffee1x.png"
    alt="Coffee Cup">
</picture>

ii. List three positive goals that can be achieved using HTML5 <picture> and
<source> attributes.

Three positives about the HTML5 <picture>
1. Can accommodate different resolutions and allow a more appropriate picture size to be added for different resolution sizes.
2. Can change the picture to accommodate different resolutions. Ex. cropping a picture for a smaller screen may look better than having the whole picture on a smaller screen whereas a larger screen may look better with an uncropped picture.
3. Forces user to define height and width attributes in CSS rather than inline with html. This ensures that the styling is done in css and there is greater separation between html and css ensuring better organization and readability.


iii. List one negative about using HTML5 <picture> and <source> attributes. How
can this negative be mitigated?
With the <picture> and <source> attributes, you would now include multiple sizes of the same image which would increase the size of your website. This negative can be mitigated by using tools to minify the size of the images you use and including fewer image choices when possible.
