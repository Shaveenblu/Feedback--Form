const Editor = toastui.Editor;
const editor = new Editor({
    el: document.querySelector("#editor"),
    initialEditType: "wysiwyg",
    usageStatistics: false,
    initialValue: ''
});

const submitButton = document.getElementById("submit");
submitButton.addEventListener("click", (event) => {
    event.preventDefault();
    console.log(editor.getMarkdown());
});
