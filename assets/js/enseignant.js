/* Animation pour simulation de changement de page de livre */
const mafunction = () => {
    const textes = document.querySelectorAll('.wrapper-text p')
    textes.forEach(text => {
        const widthEl = text.clientWidth
        console.log(text)
        text.style.transform = 'translateX(-' + widthEl + 'px)'
        text.style.transition = 'ease-in 350ms'

    })

}