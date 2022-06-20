<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=,, initial-scale=1.0">
    <title>Document</title>
    <style>
        .button--add {
    width: 30px;
    height: 30px;
    background-color: #596BE3;
    color: #fff;
    border-radius: 100%;
    font-size: 20px;
}
.event--button--add::before {
    content: '+';
}
.button--remove::before {
    content: 'x';
}
.flex--button-add {
    display: flex;
    align-items: stretch;
    justify-content: center;
    flex-direction: row;
    align-content: stretch;
}
    </style>
</head>
<body>
    <ol class="pessoa-famosa-info">
        <div class="form--area--famosa--00 event--form--clone">
            <li class="event--form--clone--01 event--remove--li">
                <input class="input--form--autor input--form--clone" value="" placeholder="Membro famoso da familia" type='text' name="0">
            </li>
        </div>
        <div class="form--area--famosa--01">
            <div class="button--add event--button--add flex--button-add" title="adicionar mais um membro">
            </div>
            <div style='display: none;' class="flex--button-add button--add event--button--remove " title="adicionar mais um membro">
                <div class="flex--button-add button--remove event--remove " title="remover membro da familia">
                </div>
            </div>
        </div>
        <input value='' name="qt_famoso" class='qt_famoso' type="hidden">
    </ol>
    
</body>
</html>