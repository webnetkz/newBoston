function Hire() {
    let inp = document.createElement('input');
    inp.setAttribute('list', 'catHire');
    inp.setAttribute('name', 'categories');
    inp.setAttribute('placeholder', 'Категория');
    inp.setAttribute('class', 'catList');
    inp.id = 'catHire';

    document.body.appendChild(inp);
}