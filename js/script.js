// const items = [
//     {name: 'Item1', img: 'path'},
//     {name: 'Item1', img: 'path'},
//     {name: 'Item1', img: 'path'}
// ];

// const itemsList = document.getElementById('itemList');
// const searchBar = document.getElementById('searchBar');

// function displayItems(items) {
//     itemsList.innerHTML = '';
//     items.forEach(item => {
//         const itemDiv = document.createElement('div');
//         itemDiv.className = 'item';

//         const itemImg = document.createElement('img');
//         itemImg.src = item.img;
//         itemImg.alt = item.name;

//         const itemName = document.createElement('span');
//         itemName.textContent = item.name;

//         itemDiv.appendChild(itemImg);
//         itemDiv.appendChild(itemName);
//         itemsList.appendChild(itemDiv);
//     })
// }

// searchBar.addEventListener('keyup',(e) => {
//     const searchString = e.target.value.toLowerCase();
//     const filteredItems = items.filter(item => item.name.toLowerCase().includes(searchString));
//     displayItems(filteredItems);
// })

// displayItems(items);

const toggleBtn = document.querySelector('.toggle-btn')
        const toggleBtnIcon = document.querySelector('.toggle-btn i')
        const dropDownMenu = document.querySelector('.dropdown-menu')

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open')
            const isOpen = dropDownMenu.classList.contains('open')

            toggleBtnIcon.classList = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'
        }

function toggleCard(card) {
    card.classList.toggle('expanded')
}

let list = document.querySelector('.slider .list')
let item = document.querySelectorAll('.slider .list .item')
let dots = document.querySelectorAll('.slider .dots li')
let prev = document.getElementById('previous')
let next = document.getElementById('next')

let active = 0;
let lengthItems = item.length - 1

next.onclick = function(){
    if(active + 1 > lengthItems){
        active = 0;
    }else{
        active = active + 1;
    }
    reloadSlider()
}

prev.onclick = function(){
    if(active - 1 < 0){
        active = lengthItems
    }else{
        active = active - 1
    }
    reloadSlider()
}

let refreshSlider = setInterval(() => {
    next.click()
}, 5000)

function reloadSlider(){
    let checkleft = item[active].offsetLeft
    list.style.left = -checkleft + 'px'

    let lastActive = document.querySelector('.slider .dots li.active')
    lastActive.classList.remove('active')
    dots[active].classList.add('active')
    clearInterval(refreshSlider)
    refreshSlider = setInterval(() => {
        next.click()
    }, 5000)
}

dots.forEach((li,key) => {
    li.addEventListener('click', function(){
        active = key;
        reloadSlider()
    })
})

