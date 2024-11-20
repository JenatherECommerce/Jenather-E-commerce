function switchContent(divId){
    document.querySelectorAll('.content > div').forEach(div => {div.classList.add('hidden');
        
    });
    document.getElementById(divId).classList.remove('hidden');
}

function readFile() {
    var scanner = new FileReader();
    var img = document.getElementById('car_viewing').files[0];



    scanner.onload = function(e) {
        document.getElementById('result').src = e.target.result;
        }
        scanner.readAsDataURL(img);
    
}

function showCarContent(brand) {
    // Determine the target div based on the brand
    let targetDiv;
    if (brand === 'Suzuki') {
      targetDiv = document.querySelector('.suzukifetchingphp');
    } else if (brand === 'Honda') {
      targetDiv = document.querySelector('.hondafetchingphp');
    }
  
    // Clear the target div before updating it
    targetDiv.innerHTML = '<p>Loading...</p>';
  
    // Fetch the car data dynamically
    fetch(`fetchcar.php?brand=${brand}`)
      .then((response) => response.text())
      .then((data) => {
        targetDiv.innerHTML = data;
      })
      .catch((error) => {
        targetDiv.innerHTML = '<p>Error fetching data. Please try again.</p>';
        console.error('Error:', error);
      });
  }
  