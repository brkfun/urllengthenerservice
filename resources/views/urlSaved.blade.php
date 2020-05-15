<!DOCTYPE html>
<html>
<body>
<input type="text" value="{{ route('len',[encryptUrl($url->md5)]) }}" id="myInput">
<button onclick="myFunction()">Copy text</button>
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
</script>
</body>
</html>
