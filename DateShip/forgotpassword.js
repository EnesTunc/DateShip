
function openModal() {
    document.getElementById("reset-password-modal").style.display = "block";
  }
  
  function closeModal() {
    document.getElementById("reset-password-modal").style.display = "none";
  }
  
 
  const closeModalButton = document.getElementById("close-modal");
  closeModalButton.addEventListener('click', closeModal);
  

  window.onclick = function(event) {
    var modal = document.getElementById("reset-password-modal");
    if (event.target == modal && !event.target.closest('form')) {
      closeModal();
    }
  };