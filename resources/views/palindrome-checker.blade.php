@extends('layouts.app')
@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function TestFunction() {
  //Here we are getting the value from the textbox on browser
  var InputStr = document.getElementById('tbox')
    .value; //here we are calling checkingPalindrome() function and passing a string into it
  var resStr = checkingPalindrome(InputStr);
  alert('The input string "' + InputStr + '" is "' + resStr +
    '"'); // This will allow a //rectangular box to be popped up on the screen to display result
}

function checkingPalindrome(InputStr) {
  var origString;
  //here we are converting the string into a lowercase string
  InputStr = InputStr.toLowerCase();
  //here we are storing the InputStr in origString for reference
  origString = InputStr;
  //here we are reversing the entered string
  InputStr = InputStr.split(''); //this function will split the input string
  InputStr = InputStr.reverse(); //this function will reverse the string
  InputStr = InputStr.join(''); //this function will join the reversed string characters
  var revString = InputStr;
  //here we are checking if both the input string and the reversed string are same
  //and based on it the string will be declared palindrome or not
  if (origString == revString) {
    return 'Palindrome string'; //  this will return "Palindrome" if true //otherwise control will flow to else condition
  } else {
    return 'not a Palindrome string';
  }
}
</script>
@endsection

@section('title')
<title>Foodnesia | Palindrome Checker</title>
@endsection

@section('css')
<link
  href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,900,900i"
  rel="stylesheet">
<style>
input {
  padding: 20px;
}

.text-center {
  text-align: center;
}

.mt-3 {
  margin-top: 3em;
}

</style>
@endsection

@section('content')
<div class="mt-5">
  <h3 class="text-center">Palindrome Checker</h3>
  <p class="text-center">Program Javascript untuk mengecek apakah text yang dimasukkan merupakan palindrome atau
    bukan.</p>
</div>
<form action="" method="get">
  <p class="text-center"><input type="text" id="tbox" placeholder="Masukkan text" />
    <input type="button" onclick="TestFunction()" value="Check" />
  </p>
</form>
@endsection
