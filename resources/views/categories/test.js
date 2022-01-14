
document.getElementById("deletCategory").addEventListener('click', function () {
   let id = document.getElementById("myId").getAttribute("data-id");
    document.getElementById('deleteFormActionRoute').innerHTML = `categories/${id}`
});
