$.ajax({
    type: "POST",
    timeout: 50000,
    url: url
    data: dataString,
    success: function (data) {
        alert('success');
        return false;
    }
});