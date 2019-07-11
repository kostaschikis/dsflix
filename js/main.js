// Change Sidebar Nav Width Based On Display
window.addEventListener('resize', () => {
  const nav = document.querySelector('nav > a');
  // console.log('Checking Ιf Browser Resizing');
  if (window.outerWidth < 960 || window.innerWidth < 960) {
    nav.removeAttribute('onclick');
    nav.setAttribute("onclick", "openNav2()");
  } else {
    nav.setAttribute("onclick", "openNav()");
  }
});

// Info Box On Hover
function checkImg() {
  const movies = document.getElementById('movies');
  for(let movie of movies.children) {
    movie.children[0].addEventListener('mouseover', () => {
      movie.children[1].style.opacity = '1';
    });
    movie.addEventListener('mouseout', () => {
      movie.children[1].style.opacity = '0';
    });
    console.log(movie.children[1]);
  }
}


// Change Sidebar Nav Width Based On Display
function checkBrowserSize() {
  const nav = document.querySelector('nav > a');
  // console.log('Checking Browser Size');
  if (window.outerWidth < 960 || window.innerWidth < 960 ) {
    console.log('Resize it');
    nav.removeAttribute('onclick');
    nav.setAttribute("onclick", "openNav2()");
  } else {
    nav.setAttribute("onclick", "openNav()");
  }
}

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.querySelector("nav a").style.display = "none";
}

function openNav2() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  document.querySelector("nav a").style.display = "block";
} 

// Fixed starting scroll point for mobile in movie section
function scrollFix() {
  let movies = document.getElementById('movie-section');
  movies.scrollLeft = 100;
}

// Show movie categories
function showCategories() {
  let cat = document.querySelector('.dropdown-content');  
  if (cat.style.display == "" || cat.style.display == "none") {
    cat.style.display = "block";
  } else if (cat.style.display == "block") {
    cat.style.display = "none";
  }
}

// Insert the movie id into the url 
function getMovieInfo(id) {
  let movieId = id
  url = 'http://localhost/dsflix/php/movie.php?movieName=' + encodeURIComponent(movieId);
  document.location.href = url;
}

// Check if user rated the movie
function checkVal() {
  let rate = document.getElementsByName('rate');
  let clicks = 0;
  rate.forEach( (item) => {
    if (item.checked) {
      clicks++;
    }
  });
}

// Login Modal Window
function modalClickOutside() {
  // Get the modal
  const modal = document.getElementById('log-in');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = () => {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}

function openLogin() {
  document.getElementById('log-in').style.display ='block'
  modalClickOutside();
}

function closeLogin() {
  document.getElementById('log-in').style.display ='none';
}

function helo() {
  console.log('all ok');
}

