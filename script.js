// script.js

// Get references to the buttons
const getInvolvedBtn = document.getElementById('getInvolvedBtn');
const donateBtn = document.getElementById('donateBtn');
const volunteerBtn = document.getElementById('volunteerBtn');

// Event listener for 'Get Involved' button
getInvolvedBtn.addEventListener('click', function() {
  alert("You will be redirected to the Get Involved page.");
  window.location.href = '/get-involved'; // Replace with actual URL
});

// Event listener for 'Donate Now' button
donateBtn.addEventListener('click', function() {
  alert("You will be redirected to the Donation page.");
  window.location.href = '/donate'; // Replace with actual URL
});

// Event listener for 'Become a Volunteer' button
volunteerBtn.addEventListener('click', function() {
  alert("You will be redirected to the Volunteer Registration page.");
  window.location.href = '/volunteer'; // Replace with actual URL
});
