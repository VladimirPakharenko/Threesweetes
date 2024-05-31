const text = document.querySelector('.a1')
const empty = document.querySelectorAll('.empty')
const b1 = document.querySelector('.b1')
const b2 = document.querySelector('.b2')
const pole = document.querySelector('.pole')
empty.forEach(el => b1.addEventListener('click', () => {
    el.value = ''
    text.textContent = "С Возращением"
    pole.classList.remove("right")
    pole.classList.add("left")
    b2.classList.toggle("hidden")
    b1.classList.toggle("hidden")
}))
empty.forEach(el => b2.addEventListener('click', () => {
    el.value = ''
    text.textContent = "Добро Пожаловать"
    pole.classList.add("right")
    pole.classList.remove("left")
    b1.classList.toggle("hidden")
    b2.classList.toggle("hidden")
}))