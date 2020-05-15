<!DOCTYPE html>
<html>
<body>
<button onclick="myFunction()">Go To Link</button>
<script>
    function myFunction() {
        location.replace("{{ $url->url }}")
    }
</script>

</body>
</html>
