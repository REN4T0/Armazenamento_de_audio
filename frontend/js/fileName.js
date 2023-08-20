function updateFileName() {
    const fileInput = document.getElementById("audioFileInput");
    const fileNameInput = document.getElementById("fileNameInput");
    
    if (fileInput.files.length > 0) {
        const fileName = fileInput.files[0].name;
        fileNameInput.value = fileName;
    } else {
        fileNameInput.value = "";
    }
}