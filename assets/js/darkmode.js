const glpage = document.querySelector("#glpage")
const btndarkmode = document.querySelector("#btndarkmode")
const logoSocialNetwork = document.querySelectorAll("logoSocialNetwork")

btndarkmode.addEventListener("click", (e) => {
    glpage.classList.toggle("dark")
})