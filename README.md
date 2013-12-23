p4.sandboxforgreg.com
=====================

Project 4 repository

General
This app is meant to be a collaborative app for uploading photos with descriptions that anyone who is part of the project can then edit.
We're doing something similar at my job involving MS Access and old prescription records, and I wanted to see if there were a way to 
construct a viable alternative, if that gets unwieldly.  This app is based around my P2 framework, but is a bit more thorough and based on photo
input.  I chose the historical Boston theme, because it's something I'm familiar with and something where I thought I could get a number of
public domain images to work with.

It has the following features:
*Users can sign themselves up.
*Users can upload photos,  and add text descriptions.
*Users can edit photo description data and delete photos
*Photos all end up in the downloads/images folder.  They are named after their id's and extensions, that are both stored in the
	photos database.
*Non-users and users alike can look at a gallery with all of the photos detailed, and can also look at a more detailed version of each record with a larger picture.

Javascript
I used javascript for the adding/editing record features.  The photos are loaded with AJAX calls, so that the page doesn't need to refresh.  When a record
is submitted it the page stays up and a confirmation is given.  There is error checking for empty fields and invalid filetypes via javascript as well.
