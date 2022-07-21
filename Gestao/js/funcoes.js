function validarCadastroImpressora() {

    var modelo = document.getElementById('modelo').value;
    var serial = document.getElementById('serial').value;
    var setor = document.getElementById('setor').value;
    var loja = document.getElementById('loja').value;

    //Deixando os campos pretos novamente para serem verificados outra vez!
    document.getElementById('0').style.color = 'black';
    document.getElementById('1').style.color = 'black';
    document.getElementById('2').style.color = 'black';
    document.getElementById('3').style.color = 'black';


    //Verificando se os campos estão vazios!

    if (modelo == '') {
        document.getElementById('0').style.color = 'red';
    }
    if (serial == '') {
        document.getElementById('1').style.color = 'red';
    }
    if (setor == '') {
        document.getElementById('2').style.color = 'red';
    }
    if (loja == '') {
        document.getElementById('3').style.color = 'red';
    }

    // Adicionando o texto de preencha ou adicionando o botão dependendo se os campos obrigatórios estão preenchidos!

    if (modelo == '' || serial == '' || setor == '' || loja == '') {
        document.getElementById('result').innerHTML = '<p>Preencha os campos em vermelho!</p>';
        document.getElementById('result').style.color = 'red';
    } else {
        document.getElementById('result').innerHTML = '<button type="submit" name="cadImpressora" value="0">Cadastrar</button';
    }

}

function filtroLoja() {

    document.getElementById('PesquisarFiltro').innerHTML = "<input type='hidden' value='1' name='metodo'>" +
        "<div id='PesquisarFiltro'>" +
        "<label id='pesquisarLabel'>Digite a loja que deseja: <input type='text' name='pesquisarFiltro' id='pesquisarInput' placeholder='Digite a loja'></label>" +
        "<button type='submit' class='buttonPesquisar'>Pesquisar</button>" +
        "</div>";

}

function filtroSetor() {

    document.getElementById('PesquisarFiltro').innerHTML = "<input type='hidden' value='2' name='metodo'>" +
        "<div id='PesquisarFiltro'>" +
        "<label id='pesquisarLabel'>Digite o setor que deseja: <input type='text' name='pesquisarFiltro' id='pesquisarInput' placeholder='Digite o setor'></label>" +
        "<button type='submit' class='buttonPesquisar'>Pesquisar</button>" +
        "</div>";

}

function filtroModelo() {

    document.getElementById('PesquisarFiltro').innerHTML = "<input type='hidden' value='3' name='metodo'>" +
        "<div id='PesquisarFiltro'>" +
        "<label id='pesquisarLabel'>Digite o modelo que deseja: <input type='text' name='pesquisarFiltro' id='pesquisarInput' placeholder='Digite o modelo'></label>" +
        "<button type='submit' class='buttonPesquisar'>Pesquisar</button>" +
        "</div>";

}