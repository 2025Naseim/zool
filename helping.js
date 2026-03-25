document.getElementById("inquiryForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let subject = document.getElementById("subjects").value.trim();
    let message = document.getElementById("messages").value.trim();
    let result = document.getElementById("result");

    if (name === "" || email === "" || subject === "" || message === "") {
        result.style.color = "red";
        result.textContent = "⚠️ يرجى تعبئة جميع الحقول";
    } else {
        result.style.color = "green";
        result.textContent = "✅ تم إرسال الاستفسار بنجاح";
        document.getElementById("inquiryForm").reset();
    }
});
