const placeholder = "http://127.0.0.1:8000/storage/posts_img/placeholder.png";
const thumbInput = document.getElementById("thumb");
const thumbPreview = document.getElementById("thumb-preview");

thumbInput.addEventListener("input", () => {
    if (thumbInput.files && thumbInput.files[0]) {
        let fileReader = new FileReader();
        fileReader.readAsDataURL(thumbInput.files[0]);
        fileReader.onload = (e) => (thumbPreview.src = e.target.result);
    } else thumbPreview.src = placeholder;
});
