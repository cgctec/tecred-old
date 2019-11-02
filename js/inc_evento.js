function SetIndex(selid, codid)
{
	i = 0;
	document.getElementById(selid).selectedIndex = 0;
	while (true)
	{
		var id_split = document.getElementById(selid).options[i].id.split('|');
		if (id_split[0] == document.getElementById(codid).value)
		{
			document.getElementById(selid).selectedIndex = document.getElementById(selid).options[i].index;
			break;
		}
		i++;
	}
}
function setCode(selid, codid)
{
	i = 0;
	while (true)
	{
		if (document.getElementById(selid).selectedIndex == document.getElementById(selid).options[i].index)
		{
			var id_split = document.getElementById(selid).options[i].id.split('|');
			document.getElementById(codid).value = id_split[0];
			break;
		}
		i++;
	}
}
function getNameByCode(code, selid)
{
	i = 0;
	while (true)
	{
		var id_split = document.getElementById('sel1').options[i].id.split('|');
		if (id_split[0] == code)
		{
			$name = document.getElementById('sel1').options[i].text;
			break
		}
	i++;
	}
	return $name;
}
function getRotByCode(code, selid)
{
	i = 0
	while (true)
	{
		var id_split = document.getElementById('sel1').options[i].id.split('|');
		if (id_split[0] == code)
		{
			$name = id_split[1];
			break
		}
	i++;
	}
	return $name;
}
function displayChars(charid)
{
	var str = document.getElementById('rot' + charid).value;
	var len = str.length;
	if (len > 30)
	{
		document.getElementById('chars' + charid).innerHTML = '<font size="3" color="red">' + len + '</font>';
	}
	else
	{
		document.getElementById('chars' + charid).innerHTML = '<font size="3" color="green">' + len + '</font>';
	}
}
function escreveFrase()
{
	i = 0;
	while (true)
	{
		if (document.getElementById('sel1').selectedIndex == document.getElementById('sel1').options[i].index)
		{
			acao = document.getElementById('sel1').options[i].text;
			acao_split = document.getElementById('sel1').options[i].id.split('|');
			acao_cod = acao_split[0];
			acao_rot = acao_split[1];
			break;
		}
		i++;
	}
	i = 0;
	while (true)
	{
		if (document.getElementById('sel2').selectedIndex == document.getElementById('sel2').options[i].index)
		{
			objeto = document.getElementById('sel2').options[i].text;
			objeto_split = document.getElementById('sel2').options[i].id.split('|');
			objeto_cod = objeto_split[0];
			objeto_rot = objeto_split[1];
			break;
		}
		i++;
	}
	i = 0;
	while (true)
	{
		if (document.getElementById('sel3').selectedIndex == document.getElementById('sel3').options[i].index)
		{
			alvo = document.getElementById('sel3').options[i].text;
			alvo_split = document.getElementById('sel3').options[i].id.split('|');
			alvo_cod = alvo_split[0];
			alvo_rot = alvo_split[1];
			break;
		}
		i++;
	}
	i = 0;
	while (true)
	{
		if (document.getElementById('sel4').selectedIndex == document.getElementById('sel4').options[i].index)
		{
			origem = document.getElementById('sel4').options[i].text;
			origem_split = document.getElementById('sel4').options[i].id.split('|');
			origem_cod = origem_split[0];
			origem_rot = origem_split[1];
			break;
		}
		i++;
	}
	i = 0;
	while (true)
	{
		if (document.getElementById('sel5').selectedIndex == document.getElementById('sel5').options[i].index)
		{
			var destino = document.getElementById('sel5').options[i].text;
			var destino_split = document.getElementById('sel5').options[i].id.split('|');
			var destino_cod = destino_split[0];
			destino_rot = destino_split[1];
			break;
		}
		i++;
	}
	var frase = acao + " " + objeto.toLowerCase();
	var frase_extorno = getNameByCode(parseInt(acao_cod) + 1000, 'sel1') + " " + objeto.toLowerCase();
	var frase_agenda = getNameByCode(parseInt(acao_cod) + 2000, 'sel1') + " " + objeto.toLowerCase();
	var frase_ext_agenda = getNameByCode(parseInt(acao_cod) + 3000, 'sel1') + " " + objeto.toLowerCase();
	var rot = acao_rot + " " + objeto_rot;
	var rot_extorno = getRotByCode(parseInt(acao_cod) + 1000, 'sel1') + " " + objeto_rot;
	var rot_agenda = getRotByCode(parseInt(acao_cod) + 2000, 'sel1') + " " + objeto_rot;
	var rot_ext_agenda = getRotByCode(parseInt(acao_cod) + 3000, 'sel1') + " " + objeto_rot;
	if (alvo_cod != 140)
	{
		if (acao_cod == 60)
		{
			var frase = frase + " do(a) " + alvo.toLowerCase();
			var frase_extorno = frase_extorno + " do(a) " + alvo.toLowerCase();
			var frase_agenda = frase_agenda + " do(a) " + alvo.toLowerCase();
			var frase_ext_agenda = frase_ext_agenda + " do(a) " + alvo.toLowerCase();
			var rot = rot + " " + alvo_rot;
			var rot_extorno = rot_extorno + " " + alvo_rot;
			var rot_agenda = rot_agenda + " " + alvo_rot;
			var rot_ext_agenda = rot_ext_agenda + " " + alvo_rot;
		}
		else
		{
			var frase = frase + " s/ " + alvo.toLowerCase();
			var frase_extorno = frase_extorno + " s/ " + alvo.toLowerCase();
			var frase_agenda = frase_agenda + " s/ " + alvo.toLowerCase();
			var frase_ext_agenda = frase_ext_agenda + " s/ " + alvo.toLowerCase();
			var rot = rot + " s/ " + alvo_rot;
			var rot_extorno = rot_extorno + " s/ " + alvo_rot;
			var rot_agenda = rot_agenda + " s/ " + alvo_rot;
			var rot_ext_agenda = rot_ext_agenda + " s/ " + alvo_rot;
		}
	}
	if (origem_cod != 140)
	{
		var frase = frase + " proveniente de " + origem.toLowerCase();
		var frase_agenda = frase_agenda + " proveniente de " + origem.toLowerCase();
		var frase_ext_agenda = frase_ext_agenda + " direcionado p/ " + origem.toLowerCase();
		var frase_extorno = frase_extorno + " direcionado p/ " + origem.toLowerCase();
		//var rot = rot + " prv/ " + origem_rot;
		//var rot_agenda = rot_agenda + " prv/ " + origem_rot;
		//var rot_extorno = rot_extorno + " dir/ " + origem_rot;
		//var rot_ext_agenda = rot_ext_agenda + " dir/ " + origem_rot;
	}
	if (destino_cod != 140)
	{
		var frase = frase + " direcionado p/ " + destino.toLowerCase();
		var frase_ext_agenda = frase_ext_agenda + " proveniente de " + destino.toLowerCase();
		var frase_agenda = frase_agenda + " direcionado p/ " + destino.toLowerCase();
		var frase_extorno = frase_extorno + " proveniente de " + destino.toLowerCase();
		//var rot = rot + " dir/ " + destino_rot;
		//var rot_agenda = rot_agenda + " dir/ " + destino_rot;
		//var rot_extorno = rot_extorno + " prv/ " + destino_rot;
		//var rot_ext_agenda = rot_ext_agenda + " prv/ " + destino_rot;
	}
	if (acao != '' && objeto != '' && alvo != '' && origem != '' && destino != '')
	{
		frase = frase + '.';
		frase_extorno = frase_extorno + '.';
		frase_agenda = frase_agenda + '.';
		frase_ext_agenda = frase_ext_agenda + '.';
		document.getElementById('frase1').value = frase;
		document.getElementById('frase2').value = frase_extorno;
		document.getElementById('frase3').value = frase_agenda;
		document.getElementById('frase4').value = frase_ext_agenda;
		document.getElementById('rot1').value = rot;
		document.getElementById('rot2').value = rot_extorno;
		document.getElementById('rot3').value = rot_agenda;
		document.getElementById('rot4').value = rot_ext_agenda;
		displayChars('1');
		displayChars('2');
		displayChars('3');
		displayChars('4');
		document.getElementById('rot1').focus();
	}
}
function EscondeSigla()
{
	if (document.getElementById('sel').selectedIndex == 0)
	{
		document.getElementById('sig').innerHTML = '';
	}
	if (document.getElementById('sel').selectedIndex == 1)
	{
		document.getElementById('sig').innerHTML = 'Sigla: <input name="sigla" type="text" class="campo" size="10" maxlenght="10" />';
	}
}
