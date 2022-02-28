window.addEventListener("load", () => {
    const colorItems = document.querySelectorAll('.color-item');
    colorItems.forEach(item => {
        item.addEventListener('click', function() {
            const idSelected = this.id;
            var color = '#bdbdbd';
            //document.body.className = idSelected;
            switch (idSelected) {
                case 'red':
                    color = '#ef5350';
                    break;
                case 'green':
                    color = '#66bb6a';
                    break;
                case 'amber':
                    color = '#ffca28';
                    break;
                case 'blue':
                    color = '#42a5f5';
                    break;
                case 'gray':
                    color = '#bdbdbd';
                    break;
                default:
                    break;
            }
            document.getElementById('color-header').style.color = color;
            document.getElementById('color').value = color;
        })
    })
});