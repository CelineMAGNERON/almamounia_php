const mafunction = () => {
    const textes = document.querySelectorAll('.wrapper-text p')
    textes.forEach(text => {
        const widthEl = text.clientWidth
        console.log(text)
        text.style.transform = 'translateX(-' + widthEl + 'px)'
        text.style.transition = 'ease-in 350ms'

    })

}