const toggleModal=document.querySelector('#toggle-modal');
const updatePicButton=document.querySelector('.edit-pic');
updatePicButton.addEventListener("click",()=>{
  const visible=toggleModal.getAttribute("data-visible");
  if(visible==="true"){
    toggleModal.setAttribute("data-visible",false);
    updatePicButton.setAttribute("aria-expanded", false);
  }
  else{
    toggleModal.setAttribute("data-visible",true);
    updatePicButton.setAttribute("aria-expanded", true)
  }
});

const toggleFn=document.querySelector('#toggle-fn');
const updateFnButton=document.querySelector('.edit-fn');
updateFnButton.addEventListener("click",()=>{
  const visible=toggleModal.getAttribute("data-visible");
  if(visible==="true"){
    toggleFn.setAttribute("data-visible",false);
    updateFnButton.setAttribute("aria-expanded", false);
  }
  else{
    toggleFn.setAttribute("data-visible",true);
    updateFnButton.setAttribute("aria-expanded", true)
  }
});

const toggleLn=document.querySelector('#toggle-ln');
const updateLnButton=document.querySelector('.edit-ln');
updateLnButton.addEventListener("click",()=>{
  const visible=toggleModal.getAttribute("data-visible");
  if(visible==="true"){
    toggleLn.setAttribute("data-visible",false);
    updateLnButton.setAttribute("aria-expanded", false);
  }
  else{
    toggleLn.setAttribute("data-visible",true);
    updateLnButton.setAttribute("aria-expanded", true)
  }
});

const toggleEm=document.querySelector('#toggle-Em');
const updateEmButton=document.querySelector('.edit-Em');
updateEmButton.addEventListener("click",()=>{
  const visible=toggleModal.getAttribute("data-visible");
  if(visible==="true"){
    toggleEm.setAttribute("data-visible",false);
    updateEmButton.setAttribute("aria-expanded", false);
  }
  else{
    toggleEm.setAttribute("data-visible",true);
    updateEmButton.setAttribute("aria-expanded", true)
  }
});

const togglePn=document.querySelector('#toggle-Pn');
const updatePnButton=document.querySelector('.edit-Pn');
updatePnButton.addEventListener("click",()=>{
  const visible=toggleModal.getAttribute("data-visible");
  if(visible==="true"){
    togglePn.setAttribute("data-visible",false);
    updatePnButton.setAttribute("aria-expanded", false);
  }
  else{
    togglePn.setAttribute("data-visible",true);
    updatePnButton.setAttribute("aria-expanded", true)
  }
});

const toggleBd=document.querySelector('#toggle-Bd');
const updateBdButton=document.querySelector('.edit-Bd');
updateBdButton.addEventListener("click",()=>{
  const visible=toggleModal.getAttribute("data-visible");
  if(visible==="true"){
    toggleBd.setAttribute("data-visible",false);
    updateBdButton.setAttribute("aria-expanded", false);
  }
  else{
    toggleBd.setAttribute("data-visible",true);
    updateBdutton.setAttribute("aria-expanded", true);
  }
});

const closePicButton=document.querySelector(".btn-close");
closePicButton.addEventListener("click",()=>{
  const visible=toggleModal.getAttribute("data-visible");
  if(visible==="true"){
    toggleModal.setAttribute("data-visible",false);
    closePicButton.setAttribute("aria-expanded",false);
  }
});

const closeFnButton=document.querySelector(".close-fn");
closeFnButton.addEventListener("click",()=>{
    const visible=toggleFn.getAttribute("data-visible");
    if(visible==="true"){
        toggleFn.setAttribute("data-visible",false);
    }
});
const closeLnButton=document.querySelector(".close-ln");
closeLnButton.addEventListener('click',()=>{
    const visible=toggleLn.getAttribute('data-visible');
    if(visible==="true"){
      toggleLn.setAttribute("data-visible",false)
    }
});
const closeEmButton=document.querySelector(".close-em");
closeEmButton.addEventListener('click',()=>{
    const visible=toggleEm.getAttribute('data-visible');
    if(visible==="true"){
      toggleEm.setAttribute('data-visible',false);    
    }
});
const closePnButton=document.querySelector(".close-pn");
closePnButton.addEventListener('click',()=>{
    const visible=togglePn.getAttribute('data-visible');
    if(visible==="true"){
      togglePn.setAttribute('data-visible',false);   
    }
});
const closeBdButton=document.querySelector(".close-bd");
closeBdButton.addEventListener('click',()=>{
    const visible=toggleBd.getAttribute('data-visible');
    if(visible==="true"){
      toggleBd.setAttribute('data-visible',false);   
    }
});