@include('header')
<h1>There Is Your URL</h1>
<form class="center vertical" onsubmit="return mySubmitFunction(event)">
<input type="text" value="{{ route('len',[encryptUrl($url->md5)]) }}" id="myInput">
<button class="medium blue" onclick="myFunction()">Copy text</button>
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
    function mySubmitFunction(e) {
        e.preventDefault();
        return false;
    }
</script>
</form>
@include('footer')
