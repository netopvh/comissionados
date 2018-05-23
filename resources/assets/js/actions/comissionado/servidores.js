//Inputs do Fomulário
let txtServidorCpf = $('input[name="cpf"]');
let txtServidorEstCivil = $('select[name="estcivil"]');
let txtServidorConjuge = $('input[name="nomeconj"]');
let txtServidorCedido = $('input:radio[name="cedido"]');
let txtServidorSecOrigem = $('select[name="sec_origem_id"]');
let txtServidorExclusivoCom = $('input:radio[name="exclusivo_comissao"]');
let txtServidorNomenclatura = $('select[name="nomenclatura_id"]');
let txtServidorTipoCargo = $('select[name="tipocargo_id"]');
let txtServidorOrgUnidade = $('input[name="nomeorgunidade"]');
let txtServidorAtivSupervisionada = $('input[name="nomeativsuper"]');
let txtServidorAutoridade = $('input[name="nomeautoridade"]');
let txtServidorInstrucao = $('select[name="instrucao_id"]');
let txtServidorFaculdade = $('input[name="nomefaculdade"]');
let txtServidorCurso = $('input[name="nomecurso"]');
let txtServidorRegistroClasse = $('input[name="registroclasse"]');

//Divs do Formulário
let dvConjuge = $('#dvConjuge');
let dvLotacaoOrig = $('#dvLotacaoOriginal');
let dvNomenclaturaCargo = $('#dvNomenclaturaCargo');
let dvDirecao = $('#dvDirecao');
let dvSupervisao = $('#dvSupervisao');
let dvAssessoria = $('#dvAssessoria');
let dvFaculdade = $('#dvFaculdade');
let dvCurso = $('#dvCurso');
let dvRegClasse = $('#dvRegClasse');

//Tabela de Lista de Servidores
let tblServidores = $('#tblServidores');
tblServidores.DataTable({
    serverSide: true,
    processing: true,
    ajax: '/api/comissionado/servidores/',
    columns: [
        {data: 'matricula', name: 'servidores.matricula', width:'5%'},
        {data: 'nome', name: 'servidores.nome',width:'22%'},
        {data: 'lotacao', name: 'secretaria.descricao'},
        {data: 'tipo', name: 'tipocargo.descricao', width:'10%'},
        {data: 'cargo', name: 'cargocomissionado.descricao', width:'17%'},
        {data: 'action', orderable: false, searchable: false, width: '115px'}
    ]
});

//Ações do Formulário
txtServidorCpf.inputmask("999.999.999-99",{
    removeMaskOnSubmit:true
});

//Ação ao selecionar opção
txtServidorEstCivil.on('change', function(){
    if ($(this).val() === 'U') {
        dvConjuge.collapse('show');
        txtServidorConjuge.prop('required',true);
    }
    else if ($(this).val() === 'C') {
        dvConjuge.collapse('show');
        txtServidorConjuge.prop('required',true);
    }
    else {
        dvConjuge.collapse('hide');
        txtServidorConjuge.prop('required',false);
    }
});
//Ação ao carregar formulário
if (txtServidorEstCivil.val() === 'U') {
    dvConjuge.collapse('show');
    txtServidorConjuge.prop('required',true);
}
else if (txtServidorEstCivil.val() === 'C') {
    dvConjuge.collapse('show');
    txtServidorConjuge.prop('required',true);
}
else {
    dvConjuge.collapse('hide');
    txtServidorConjuge.prop('required',false);
}

//Ação ao selecionar opção
txtServidorCedido.change(function(){
    if(this.value === 'S') {
        dvLotacaoOrig.collapse('show');
        txtServidorSecOrigem.prop('required',true);
    }
    else if(this.value === 'N') {
        dvLotacaoOrig.collapse('hide');
        txtServidorSecOrigem.prop('required',false);
    }
});
//Ação ao carregar formulário
if(txtServidorCedido.filter(':checked').val() === 'S') {
    dvLotacaoOrig.collapse('show');
    txtServidorSecOrigem.prop('required',true);
}
else if(txtServidorCedido.filter(':checked').val() === 'N') {
    dvLotacaoOrig.collapse('hide');
    txtServidorSecOrigem.prop('required',false);
}

//Ação ao selecionar opção
txtServidorExclusivoCom.change(function(){
    if(this.value === 'N') {
        dvNomenclaturaCargo.collapse('show');
        txtServidorNomenclatura.prop('required',true);
    }
    else if(this.value === 'S') {
        dvNomenclaturaCargo.collapse('hide');
        txtServidorNomenclatura.prop('required',false);
    }
});
//Ação ao carregar formulário
if(txtServidorExclusivoCom.filter(':checked').val() === 'N') {
    dvNomenclaturaCargo.collapse('show');
    txtServidorNomenclatura.prop('required',true);
}
else if(txtServidorExclusivoCom.filter(':checked').val() === 'S') {
    dvNomenclaturaCargo.collapse('hide');
    txtServidorNomenclatura.prop('required',false);
}

//Ação ao selecionar opção
txtServidorTipoCargo.on('change', function(){
    if ($(this).val() == 1) {
        dvDirecao.collapse('show');
        dvSupervisao.collapse('hide');
        dvAssessoria.collapse('hide');
        txtServidorOrgUnidade.prop('required',true);
        txtServidorAtivSupervisionada.prop('required',false);
        txtServidorAutoridade.prop('required',false);
    }
    else if ($(this).val() == 2) {
        dvDirecao.collapse('hide');
        dvSupervisao.collapse('show');
        dvAssessoria.collapse('hide');
        txtServidorOrgUnidade.prop('required',false);
        txtServidorAtivSupervisionada.prop('required',true);
        txtServidorAutoridade.prop('required',false);
    }
    else if ($(this).val() == 3) {
        dvDirecao.collapse('hide');
        dvSupervisao.collapse('hide');
        dvAssessoria.collapse('show');
        txtServidorOrgUnidade.prop('required',false);
        txtServidorAtivSupervisionada.prop('required',false);
        txtServidorAutoridade.prop('required',true);
    }
});
//Ação ao carregar formulário
if (txtServidorTipoCargo.val() == 1) {
    dvDirecao.collapse('show');
    dvSupervisao.collapse('hide');
    dvAssessoria.collapse('hide');
    txtServidorOrgUnidade.prop('required',true);
    txtServidorAtivSupervisionada.prop('required',false);
    txtServidorAutoridade.prop('required',false);
}
else if (txtServidorTipoCargo.val() == 2) {
    dvDirecao.collapse('hide');
    dvSupervisao.collapse('show');
    dvAssessoria.collapse('hide');
    txtServidorOrgUnidade.prop('required',false);
    txtServidorAtivSupervisionada.prop('required',true);
    txtServidorAutoridade.prop('required',false);
}
else if (txtServidorTipoCargo.val() == 3) {
    dvDirecao.collapse('hide');
    dvSupervisao.collapse('hide');
    dvAssessoria.collapse('show');
    txtServidorOrgUnidade.prop('required',false);
    txtServidorAtivSupervisionada.prop('required',false);
    txtServidorAutoridade.prop('required',true);
}

//Ação ao selecionar opção
txtServidorInstrucao.on('change', function(){
    if ($(this).val() == 7) {
        dvFaculdade.collapse('show');
        dvCurso.collapse('show');
        txtServidorFaculdade.prop('required',true);
        txtServidorCurso.prop('required',true);
        if (dvRegClasse.on('shown.bs.collapse')) {
            dvRegClasse.collapse('hide');
            txtServidorRegistroClasse.prop('required',false);
        }
    }
    else if ($(this).val() > 7) {
        dvFaculdade.collapse('show');
        dvCurso.collapse('show');
        dvRegClasse.collapse('show');
        txtServidorFaculdade.prop('required',true);
        txtServidorCurso.prop('required',true);
        txtServidorRegistroClasse.prop('required',false);
    }
    else {
        dvFaculdade.collapse('hide');
        dvCurso.collapse('hide');
        dvRegClasse.collapse('hide');
        txtServidorFaculdade.prop('required',false);
        txtServidorCurso.prop('required',false);
        txtServidorRegistroClasse.prop('required',false);
    }
});
//Ação ao carregar formulário
if (txtServidorInstrucao.val() == 7) {
    dvFaculdade.collapse('show');
    dvCurso.collapse('show');
    txtServidorFaculdade.prop('required',true);
    txtServidorCurso.prop('required',true);
    if (dvRegClasse.on('shown.bs.collapse')) {
        dvRegClasse.collapse('hide');
        txtServidorRegistroClasse.prop('required',false);
    }
}
else if (txtServidorInstrucao.val() > 7) {
    dvFaculdade.collapse('show');
    dvCurso.collapse('show');
    dvRegClasse.collapse('show');
    txtServidorFaculdade.prop('required',true);
    txtServidorCurso.prop('required',true);
    txtServidorRegistroClasse.prop('required',false);
}
else {
    dvFaculdade.collapse('hide');
    dvCurso.collapse('hide');
    dvRegClasse.collapse('hide');
    txtServidorFaculdade.prop('required',false);
    txtServidorCurso.prop('required',false);
    txtServidorRegistroClasse.prop('required',false);
}