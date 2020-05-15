<form method="POST" action="{{ route('sendUrl') }}">
    @csrf
    <label for="fname">Link:</label><br>
    <input type="url" id="link" name="link" placeholder="https://google.com"><br>
    <input type="submit" value="Send">
</form>
