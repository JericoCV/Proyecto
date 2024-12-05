
// Update the DOM
document.getElementById('final-score').textContent = finalScore;

// Show PASS or FAIL
if (finalScore >= 80) {
  document.getElementById('pass-box').style.backgroundColor = '#003399';
  document.getElementById('pass-box').style.color = 'white';
  document.getElementById('fail-box').style.backgroundColor = 'white';
  document.getElementById('fail-box').style.color = 'black';
} else {
  document.getElementById('fail-box').style.backgroundColor = '#003399';
  document.getElementById('fail-box').style.color = 'white';
  document.getElementById('pass-box').style.backgroundColor = 'white';
  document.getElementById('pass-box').style.color = 'black';
}
