const signUpButton = document.getElementsByClassName('signUp');
const signInButton = document.getElementsByClassName('signIn');
const container = document.getElementsByClassName('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});