This is an Alternate Layout for a Custom HTML Module in Joomla 4

This code is inspired by https://sharingbuttons.io with the main advantage that there is
- no javaScript => lighter & faster
- no tracking => by definition it respects Privacy and it is ao GDPR compliant
If you wish more Sharing Buttons than Facebook, Twitter, Linkedin, WhatsApp and Email implemented here, feel free to adapt the code below with any of the 7 others available buttons

https://sharingbuttons.io being *static*, you have to type manually the url and the text
The goal of the current code is to make those Sharing Buttons *dynamic*, namely with
- the current url
- and the current site name
We also add a 'title' to each link that you can customize

Procedure
- create an Alternate Layout
  - either manually by creating the following file /templates/YOUR_TEMPLATE/html/mod_custom/sharingbuttons.php
  - or via Joomla's interface
- copy the current code in the created file
- publish a Custom HTML Module in an existing position (for example main-bottom in the Template Cassiopeia)
- on the Tab 'Advanced'
  - select the current Layout (ie 'sharingbuttons')
  - select No Caching (otherwise you might have the sharing url of page X on page Y)
- clear your cache if necessary
- that's it!
