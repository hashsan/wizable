//fullback.js
//need fullback.css


if(!document.querySelector('#fullback')){
  const fullback = document.createElement('img')
  fullback.id = 'fullback'
  document.body.append(fullback)
}


document.body.addEventListener('click', (event) => {
  if (event.target.tagName === 'IMG') {
    if (event.target.id !== 'fullback') {
      event.stopPropagation();
      const src = event.target.src;
      const fullback = document.querySelector('#fullback');
      if(fullback.src === src){
        fullback.removeAttribute('src')
      }else{      
        fullback.src = src;
      }
    }
  }
});
