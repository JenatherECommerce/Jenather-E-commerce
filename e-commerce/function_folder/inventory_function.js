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