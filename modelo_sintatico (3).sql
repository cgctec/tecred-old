-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2010 at 08:20 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `modelo_sintatico`
--

-- --------------------------------------------------------

--
-- Table structure for table `acoes_bloqueio`
--

CREATE TABLE IF NOT EXISTS `acoes_bloqueio` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(200) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `acoes_bloqueio`
--

INSERT INTO `acoes_bloqueio` (`codigo`, `nome`) VALUES
(1, 'Gerar Prestação'),
(2, 'Emitir Boleto'),
(3, 'Emitir Carta Cobrança Devedor'),
(4, 'Emitir Carta Cobrança Avalista'),
(5, 'Receber Prestação');

-- --------------------------------------------------------

--
-- Table structure for table `contrato`
--

CREATE TABLE IF NOT EXISTS `contrato` (
  `NU_CONTRATO` int(11) NOT NULL,
  `ORIGEM` int(6) NOT NULL,
  `SIS_AMORTIZACAO` smallint(1) NOT NULL,
  `TX_JUROS` decimal(7,4) NOT NULL,
  `PRAZO_AMORTIZACAO` int(3) NOT NULL,
  `PRAZO_PRORROGACAO` int(3) NOT NULL,
  `NU_PRESTACAO_EMITIDAS` int(6) NOT NULL,
  `NU_PRESTACAO` int(11) NOT NULL,
  `DT_ASSINATURA` date NOT NULL,
  `DT_VENCIMENTO` date NOT NULL,
  `NU_REGRA_EVOLUCAO` int(3) NOT NULL,
  `APOLICE` int(6) NOT NULL,
  `SEGURADORA` int(3) NOT NULL,
  `PAC_RENDA` decimal(7,4) NOT NULL,
  `BLOQ1` int(11) DEFAULT NULL,
  `BLOQ2` int(11) DEFAULT NULL,
  `BLOQ3` int(11) DEFAULT NULL,
  `BLOQ4` int(11) DEFAULT NULL,
  `BLOQ5` int(11) DEFAULT NULL,
  `BLOQ6` int(11) DEFAULT NULL,
  `BLOQ7` int(11) DEFAULT NULL,
  `BLOQ8` int(11) DEFAULT NULL,
  `BLOQ9` int(11) DEFAULT NULL,
  `BLOQ10` int(11) DEFAULT NULL,
  PRIMARY KEY (`NU_CONTRATO`),
  UNIQUE KEY `NU_CONTRATO` (`NU_CONTRATO`),
  KEY `NU_CONTRATO_2` (`NU_CONTRATO`),
  KEY `NU_CONTRATO_3` (`NU_CONTRATO`),
  KEY `NU_CONTRATO_4` (`NU_CONTRATO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contrato`
--

INSERT INTO `contrato` (`NU_CONTRATO`, `ORIGEM`, `SIS_AMORTIZACAO`, `TX_JUROS`, `PRAZO_AMORTIZACAO`, `PRAZO_PRORROGACAO`, `NU_PRESTACAO_EMITIDAS`, `NU_PRESTACAO`, `DT_ASSINATURA`, `DT_VENCIMENTO`, `NU_REGRA_EVOLUCAO`, `APOLICE`, `SEGURADORA`, `PAC_RENDA`, `BLOQ1`, `BLOQ2`, `BLOQ3`, `BLOQ4`, `BLOQ5`, `BLOQ6`, `BLOQ7`, `BLOQ8`, `BLOQ9`, `BLOQ10`) VALUES
(1021001, 10, 1, '42.1239', 3, 1, 0, 0, '2010-11-04', '2010-11-30', 3, 666666, 30, '79.7281', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(454545, 10, 2, '10.0000', 20, 10, 0, 30, '2010-11-05', '2010-11-10', 1, 666666, 20, '80.0000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(454546, 10, 2, '10.0000', 10, 20, 0, 30, '2010-11-05', '2010-11-12', 1, 666666, 20, '80.0000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `controle_processamento`
--

CREATE TABLE IF NOT EXISTS `controle_processamento` (
  `CODIGO` smallint(6) NOT NULL AUTO_INCREMENT,
  `NOME` char(200) NOT NULL,
  `DT_ULTIMO_PROCESSAMENTO` date NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `controle_processamento`
--

INSERT INTO `controle_processamento` (`CODIGO`, `NOME`, `DT_ULTIMO_PROCESSAMENTO`) VALUES
(1, 'Gerar Prestação', '2010-11-01'),
(2, 'Efetivar Prestação', '2010-11-01'),
(3, 'Emitir Boleto', '2010-11-01'),
(4, 'Emitir Carta Cobrança Devedor', '2010-11-01'),
(5, 'Emitir Carta Cobrança Avalista', '2010-11-01'),
(6, 'Receber Prestação', '2010-11-01'),
(7, 'Gerar Débito em Conta', '2010-11-01'),
(8, 'Contabilizar', '2010-11-01'),
(9, 'Reprocessar', '2010-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `COD_IMOVEL` int(5) NOT NULL AUTO_INCREMENT,
  `NU_CONTRATO` int(6) NOT NULL,
  `VL_AVALIACAO` decimal(20,2) NOT NULL,
  `VL_VENDA` decimal(20,2) NOT NULL,
  `VL_VENAL` decimal(20,2) NOT NULL,
  `VL_BRUTO` decimal(20,2) NOT NULL,
  `VL_RENDA` decimal(20,2) NOT NULL,
  `registro` char(200) NOT NULL,
  `endereco` char(200) NOT NULL,
  `numero` int(5) NOT NULL,
  `complemento` char(200) NOT NULL,
  `bairro` char(200) NOT NULL,
  `cidade` char(200) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` char(200) NOT NULL,
  `padrao` int(5) NOT NULL,
  `TIPO_CONSTRUCAO` int(5) NOT NULL,
  PRIMARY KEY (`COD_IMOVEL`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `imoveis`
--

INSERT INTO `imoveis` (`COD_IMOVEL`, `NU_CONTRATO`, `VL_AVALIACAO`, `VL_VENDA`, `VL_VENAL`, `VL_BRUTO`, `VL_RENDA`, `registro`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `padrao`, `TIPO_CONSTRUCAO`) VALUES
(8, 454545, '100.00', '100.00', '100.00', '100.00', '100.00', '100', '100', 100, '100', '100', '100', 'AC', '11111-111', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `imovel_padrao`
--

CREATE TABLE IF NOT EXISTS `imovel_padrao` (
  `COD_PADRAO` int(5) NOT NULL AUTO_INCREMENT,
  `NOME_PADRAO` char(200) NOT NULL,
  PRIMARY KEY (`COD_PADRAO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `imovel_padrao`
--

INSERT INTO `imovel_padrao` (`COD_PADRAO`, `NOME_PADRAO`) VALUES
(5, 'Usado'),
(4, 'Novo');

-- --------------------------------------------------------

--
-- Table structure for table `imovel_tipo_construcao`
--

CREATE TABLE IF NOT EXISTS `imovel_tipo_construcao` (
  `COD_TIPO_CONSTRUCAO` int(5) NOT NULL AUTO_INCREMENT,
  `NOME_TIPO_CONSTRUCAO` char(200) NOT NULL,
  PRIMARY KEY (`COD_TIPO_CONSTRUCAO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `imovel_tipo_construcao`
--

INSERT INTO `imovel_tipo_construcao` (`COD_TIPO_CONSTRUCAO`, `NOME_TIPO_CONSTRUCAO`) VALUES
(8, 'Misto'),
(7, 'Terreno'),
(6, 'Comercial'),
(5, 'Residencial');

-- --------------------------------------------------------

--
-- Table structure for table `modelo_sintatico`
--

CREATE TABLE IF NOT EXISTS `modelo_sintatico` (
  `tipo` int(1) NOT NULL,
  `codigo` int(5) NOT NULL,
  `nome` text CHARACTER SET utf8 NOT NULL,
  `rotulo` char(30) DEFAULT NULL,
  `matricula` int(5) NOT NULL,
  `c_time` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modelo_sintatico`
--

INSERT INTO `modelo_sintatico` (`tipo`, `codigo`, `nome`, `rotulo`, `matricula`, `c_time`) VALUES
(1, 10, 'Incluir', 'Inc.\r\n', 0, 0),
(1, 20, 'Transferir', 'Trsf.\r\n', 0, 0),
(1, 30, 'Descontar', 'Desc.\r\n', 0, 0),
(1, 40, 'Consolidar', 'Cons.\r\n', 0, 0),
(1, 50, 'Receber', 'Rec.\r\n', 0, 0),
(1, 60, 'Registrar', 'Reg.\r\n', 0, 0),
(1, 61, 'Apurar', 'Ap.\r\n', 0, 0),
(1, 70, 'Reservar', 'Res.\r\n', 0, 0),
(1, 80, 'Efetivar', 'Efet.\r\n', 0, 0),
(1, 90, 'Repassar', 'Reps.\r\n', 0, 0),
(1, 100, 'Devolver', 'Dev.\r\n', 0, 0),
(1, 105, 'Incorporar', 'Inc.\r\n', 0, 0),
(1, 110, 'Abater', 'Abt.\r\n', 0, 0),
(1, 1010, 'Estornar inclusão', 'Est.Inc.\r\n', 0, 0),
(1, 1020, 'Estornar transferência', 'Est.Trsf.\r\n', 0, 0),
(1, 1030, 'Estornar desconto', 'Est.Desc.\r\n', 0, 0),
(1, 1040, 'Estornar Consolidação', 'Est.Cons.\r\n', 0, 0),
(1, 1050, 'Estornar recebimento', 'Est.Rec.\r\n', 0, 0),
(1, 1060, 'Estornar registro', 'Est.Reg.\r\n', 0, 0),
(1, 1061, 'Estornar apuração', 'Est.Ap.\r\n', 0, 0),
(1, 1070, 'Estornar reserva', 'Est.Res.\r\n', 0, 0),
(1, 1080, 'Estornar efetivação', 'Est.Efet.\r\n', 0, 0),
(1, 1090, 'Estornar repasse', 'Est.Reps.\r\n', 0, 0),
(1, 1100, 'Estornar devolução', 'Est.Dev.\r\n', 0, 0),
(1, 1105, 'Estornar incorporação', 'Est.Inc.\r\n', 0, 0),
(1, 1110, 'Estornar abatimento', 'Est.Abt.\r\n', 0, 0),
(1, 2010, 'Agendar inclusão', 'Ag.Inc.\r\n', 0, 0),
(1, 2020, 'Agendar transferência', 'Ag.Trsf.\r\n', 0, 0),
(1, 2030, 'Agendar desconto', 'Ag.Desc.\r\n', 0, 0),
(1, 2040, 'Agendar Consolidação', 'Ag.Cons.\r\n', 0, 0),
(1, 2050, 'Agendar recebimento', 'Ag.Rec.\r\n', 0, 0),
(1, 2060, 'Agendar registro', 'Ag.Reg.\r\n', 0, 0),
(1, 2061, 'Agendar apuração', 'Ag.Ap.\r\n', 0, 0),
(1, 2070, 'Agendar reserva', 'Ag.Res.\r\n', 0, 0),
(1, 2080, 'Agendar efetivação', 'Ag.Efet.\r\n', 0, 0),
(1, 2090, 'Agendar repasse', 'Ag.Reps.\r\n', 0, 0),
(1, 2100, 'Agendar devolução', 'Ag.Dev.\r\n', 0, 0),
(1, 2105, 'Agendar incorporação', 'Ag.Inc.\r\n', 0, 0),
(1, 2110, 'Agendar abatimento', 'Ag.Abt.\r\n', 0, 0),
(1, 3010, 'Estornar agendamento de inclusão', 'Est.ag.Inc.\r\n', 0, 0),
(1, 3020, 'Estornar agendamento de transferência', 'Est.ag.Trsf.\r\n', 0, 0),
(1, 3030, 'Estornar agendamento de desconto', 'Est.ag.Desc.\r\n', 0, 0),
(1, 3040, 'Estornar agendamento de Consolidação', 'Est.ag.Cons.\r\n', 0, 0),
(1, 3050, 'Estornar agendamento de recebimento', 'Est.ag.Rec.\r\n', 0, 0),
(1, 3060, 'Estornar agendamento de registro', 'Est.ag.Reg.\r\n', 0, 0),
(1, 3061, 'Estornar agendamento de apuração', 'Est.ag.Ap.\r\n', 0, 0),
(1, 3070, 'Estornar agendamento de reserva', 'Est.ag.Res.\r\n', 0, 0),
(1, 3080, 'Estornar agendamento de efetivação', 'Est.ag.Efet.\r\n', 0, 0),
(1, 3090, 'Estornar agendamento de repasse', 'Est.ag.Reps.\r\n', 0, 0),
(1, 3100, 'Estornar agendamento de devolução', 'Est.ag.Dev.\r\n', 0, 0),
(1, 3105, 'Estornar agendamento de incorporação', 'Est.ag.Inc.\r\n', 0, 0),
(1, 3110, 'Estornar agendamento de abatimento', 'Est.ag.Abt.\r\n', 0, 0),
(2, 10, 'Não definido', '\r\n', 0, 0),
(2, 20, 'Valor', 'Valor\r\n', 0, 0),
(2, 30, 'Aporte de Capital', 'apt.cap.\r\n', 0, 0),
(2, 40, 'Financiamento', 'financ.\r\n', 0, 0),
(2, 50, 'Valor bruto', 'vr.brt\r\n', 0, 0),
(2, 60, 'Valor líquido', 'vr.liq.\r\n', 0, 0),
(2, 70, 'Saldo devedor do cliente', 'sd.dev.\r\n', 0, 0),
(2, 80, 'Correção Monetária', 'CM\r\n', 0, 0),
(2, 90, 'Juros Contratuais', 'jrs.cto\r\n', 0, 0),
(2, 100, 'Juros remuneratórios', 'jrs.rem.\r\n', 0, 0),
(2, 110, 'Juros compensatórios', 'jrs.cmp.\r\n', 0, 0),
(2, 120, 'Juros moratórios', 'jrs.mor.\r\n', 0, 0),
(2, 130, 'Multa', 'mta\r\n', 0, 0),
(2, 140, 'Comissão de Permanência', 'c.perm.\r\n', 0, 0),
(2, 150, 'IOF', 'IOF\r\n', 0, 0),
(2, 151, 'IOF à vista', 'IOF vst\r\n', 0, 0),
(2, 152, 'IOF incorporado ao financiamento', 'IOF inc\r\n', 0, 0),
(2, 160, 'Principal do financiamento', 'pcp finan.\r\n', 0, 0),
(2, 161, 'Principal da prestação', 'pcp.prst.\r\n', 0, 0),
(2, 162, 'Juros contratuais incorp à prestação', 'jrs.prst.\r\n', 0, 0),
(2, 163, 'Prestação', 'prst.\r\n', 0, 0),
(2, 164, 'Principal FGTS', 'pcp.FGTS\r\n', 0, 0),
(2, 165, 'Saldo FGTS', 'sdo.FGTS\r\n', 0, 0),
(2, 166, 'Valor de FGTS', 'vr.FGTS\r\n', 0, 0),
(2, 167, 'Garantia carta de fianca', 'grnta Fianca\r\n', 0, 0),
(2, 168, 'Garantia imóvel rural', 'grnta Imov Rural\r\n', 0, 0),
(2, 169, 'Garantia imóvel urbano', 'grnta Imov Urb\r\n', 0, 0),
(2, 170, 'Garantia automóvel', 'grnta Autom\r\n', 0, 0),
(2, 171, 'Garantia precatórios Uniao', 'grnta Prec UF\r\n', 0, 0),
(2, 175, 'Taxas', 'tx.\r\n', 0, 0),
(2, 180, 'TAV - Taxa de avaliação', 'TAV\r\n', 0, 0),
(2, 181, 'TVI - Taxa de Vistoria', 'TVI\r\n', 0, 0),
(2, 182, 'TAD -Taxa de Administração', 'TAD\r\n', 0, 0),
(2, 183, 'TAO - Tarifa Operacional', 'TAO \r\n', 0, 0),
(2, 184, 'TOM - Taxa Operacional Mensal', 'TOM\r\n', 0, 0),
(2, 185, 'TAC - Taxa de Abertura de Crédito', 'TAC\r\n', 0, 0),
(2, 186, 'TRC -Taxa de Risco de Crédito', 'TRC\r\n', 0, 0),
(2, 187, 'TCA - Taxa de cobrança p/ Administração', 'TCA\r\n', 0, 0),
(2, 188, 'TAIS - Taxa de Arrend. imóvel substituído', 'TAIS\r\n', 0, 0),
(2, 189, 'TAR - Taxa de arrendamento', 'TAR\r\n', 0, 0),
(2, 190, 'TOI - Taxa de Ocupação Irregular', 'TOI\r\n', 0, 0),
(2, 191, 'TOC - Taxa de Ociosodade', 'TOC\r\n', 0, 0),
(2, 192, 'TCRA - Taxa de Crédito e Administração', 'TCRA\r\n', 0, 0),
(2, 193, 'TCRE - Taxa de Crédito', 'TCRE\r\n', 0, 0),
(2, 194, 'TCC - Taxa de Cobertura de Custos', 'TCC\r\n', 0, 0),
(2, 195, 'TMC - Taxa de Manutenção', 'TMC\r\n', 0, 0),
(2, 196, 'TEQ - Taxa de Equalização', 'TEQ\r\n', 0, 0),
(2, 197, 'TESFH - Taxa de Enquadramento no SFH', 'TESFH\r\n', 0, 0),
(2, 210, 'TAV - Taxa de avaliação à vista', 'TAV\r\n', 0, 0),
(2, 211, 'TVI - Taxa de Vistoria à vista', 'TVI\r\n', 0, 0),
(2, 212, 'TAD -Taxa de Administração à vista', 'TAD\r\n', 0, 0),
(2, 213, 'TAO - Tarifa Operacional à vista', 'TAO\r\n', 0, 0),
(2, 214, 'TOM - Taxa Operacional Mensal à vista', 'TOM\r\n', 0, 0),
(2, 215, 'TAC - Taxa de Abertura de Crédito à vista', 'TAC\r\n', 0, 0),
(2, 216, 'TRC -Taxa de Risco de Crédito à vista', 'TRC\r\n', 0, 0),
(2, 217, 'TCA - Taxa de cobrança p/ Administração à vista', 'TCA\r\n', 0, 0),
(2, 218, 'TAIS - Taxa de Arrend. imóvel substituído à vista', 'TAIS\r\n', 0, 0),
(2, 219, 'TAR - Taxa de arrendamento à vista', 'TAR\r\n', 0, 0),
(2, 220, 'TOI - Taxa de Ocupação Irregular à vista', 'TOI\r\n', 0, 0),
(2, 221, 'TOC - Taxa de Ociosodade à vista', 'TOC\r\n', 0, 0),
(2, 222, 'TCRA - Taxa de Crédito e Administração à vista', 'TCRA\r\n', 0, 0),
(2, 223, 'TCRE - Taxa de Crédito à vista', 'TCRE\r\n', 0, 0),
(2, 224, 'TCC - Taxa de Cobertura de Custos à vista', 'TCC\r\n', 0, 0),
(2, 225, 'TMC - Taxa de Manutenção à vista', 'TMC\r\n', 0, 0),
(2, 226, 'TEQ - Taxa de Equalização à vista', 'TEQ \r\n', 0, 0),
(2, 227, 'TESFH - Taxa de Enquadramento no SFH à vista', 'TESFH \r\n', 0, 0),
(2, 240, 'TAV - Taxa de avaliação - incorp. ao financ.', 'TAV\r\n', 0, 0),
(2, 241, 'TVI - Taxa de Vistoria - incorp. ao financ.', 'TVI\r\n', 0, 0),
(2, 242, 'TAD -Taxa de Administração - incorp. ao financ.', 'TAD\r\n', 0, 0),
(2, 243, 'TAO - Tarifa Operacional - incorp. ao financ.', 'TAO\r\n', 0, 0),
(2, 244, 'TOM - Taxa Operacional Mensal - incorp. ao financ.', 'TOM\r\n', 0, 0),
(2, 245, 'TAC - Taxa de Abertura de Crédito - incorp. ao financ.', 'TAC\r\n', 0, 0),
(2, 246, 'TRC -Taxa de Risco de Crédito - incorp. ao financ.', 'TRC\r\n', 0, 0),
(2, 247, 'TCA - Taxa de cobrança p/ Adm. - incorp. ao financ.', 'TCA\r\n', 0, 0),
(2, 248, 'TAIS - Taxa de Arrend. imóvel subst. - incorp. ao financ.', 'TAIS\r\n', 0, 0),
(2, 249, 'TAR - Taxa de arrendamento - incorp. ao financ.', 'TAR\r\n', 0, 0),
(2, 250, 'TOI - Taxa de Ocupação Irregular - incorp. ao financ.', 'TOI\r\n', 0, 0),
(2, 251, 'TOC - Taxa de Ociosodade - incorp. ao financ.', 'TOC\r\n', 0, 0),
(2, 252, 'TCRA - Taxa de Crédito e Adm. - incorp. ao financ.', 'TCRA\r\n', 0, 0),
(2, 253, 'TCRE - Taxa de Crédito - incorp. ao financ.', 'TCRE\r\n', 0, 0),
(2, 254, 'TCC - Taxa de Cobert. Custos - incorp. ao financ.', 'TCC\r\n', 0, 0),
(2, 255, 'TMC - Taxa de Manutenção - incorp. ao financ.', 'TMC\r\n', 0, 0),
(2, 256, 'TEQ - Taxa de Equalização - incorp. ao financ.', 'TEQ\r\n', 0, 0),
(2, 257, 'TESFH - Taxa de Enquad. SFH - incorp. ao financ.', 'TESFH \r\n', 0, 0),
(2, 270, 'TAV - Taxa de avaliação incorp. à prestação', 'TAV\r\n', 0, 0),
(2, 271, 'TVI - Taxa de Vistoria incorp. à prestação', 'TVI\r\n', 0, 0),
(2, 272, 'TAD -Taxa de Administração incorp. à prestação', 'TAD\r\n', 0, 0),
(2, 273, 'TAO - Tarifa Operacional incorp. à prestação', 'TAO\r\n', 0, 0),
(2, 274, 'TOM - Taxa Operacional Mensal incorp. à prestação', 'TOM\r\n', 0, 0),
(2, 275, 'TAC - Taxa de Abertura de Crédito incorp. à prestação', 'TAC\r\n', 0, 0),
(2, 276, 'TRC -Taxa de Risco de Crédito incorp. à prestação', 'TRC\r\n', 0, 0),
(2, 277, 'TCA - Taxa de cobrança p/ Adm. incorp. à prestação', 'TCA\r\n', 0, 0),
(2, 278, 'TAIS - Taxa de Arrend. imóvel subst.  incorp. à prestação', 'TAIS\r\n', 0, 0),
(2, 279, 'TAR - Taxa de arrendamento incorp. à prestação', 'TAR\r\n', 0, 0),
(2, 280, 'TOI - Taxa de Ocupação Irregular incorp. à prestação', 'TOI\r\n', 0, 0),
(2, 281, 'TOC - Taxa de Ociosodade incorp. à prestação', 'TOC\r\n', 0, 0),
(2, 282, 'TCRA - Taxa de Crédito e Adm. - incorp. à prestação', 'TCRA\r\n', 0, 0),
(2, 283, 'TCRE - Taxa de Crédito - incorp. à prestação', 'TCRE\r\n', 0, 0),
(2, 284, 'TCC - Taxa de Cobert. Custos - incorp. à prestação', 'TCC\r\n', 0, 0),
(2, 285, 'TMC - Taxa de Manutenção - incorp. à prestação', 'TMC\r\n', 0, 0),
(2, 286, 'TEQ - Taxa de Equalização - incorp. à prestação', 'TEQ\r\n', 0, 0),
(2, 287, 'TESFH - Taxa de Enquad.SFH - incorp. à prestação', 'TESFH\r\n', 0, 0),
(2, 300, 'Premios de seguro', 'prem.seg.\r\n', 0, 0),
(2, 301, 'Premio de seguro SCI1', 'pr.seg.SCI1\r\n', 0, 0),
(2, 302, 'Premio de seguro SCI2', 'pr.seg.SCI2\r\n', 0, 0),
(2, 303, 'Premio de seguro MIP', 'pr.seg.MIP\r\n', 0, 0),
(2, 304, 'Premio de seguro DFI', 'pr.seg.DFI\r\n', 0, 0),
(2, 305, 'Premio de seguro SCI1 à vista', 'pr.sg.SCI1 Vst.\r\n', 0, 0),
(2, 306, 'Premio de seguro SCI2 à vista', 'pr.sg.SCI2 Vst.\r\n', 0, 0),
(2, 307, 'Premio de seguro MIP à vista', 'pr.sg.MIP Vst.\r\n', 0, 0),
(2, 308, 'Premio de seguro DFI à vista', 'pr.sg.DFI Vst.\r\n', 0, 0),
(2, 309, 'Premio de seguro SCI1 incorp. ao financiamento', 'pr.sg.SCI1 inc.fin.\r\n', 0, 0),
(2, 310, 'Premio de seguro SCI2 incorp. ao financiamento', 'pr.sg.SCI2 inc.fin.\r\n', 0, 0),
(2, 311, 'Premio de seguro MIP incorp. ao financiamento', 'pr.sg.MIP inc.fin.\r\n', 0, 0),
(2, 312, 'Premio de seguro DFI incorp. ao financiamento', 'pr.sg.DFI inc.fin.\r\n', 0, 0),
(2, 313, 'Premio de seguro SCI1 incorp. à prestação', 'pr.sg.SCI1 inc.prt.\r\n', 0, 0),
(2, 314, 'Premio de seguro SCI2 incorp. à prestação', 'pr.sg.SCI2 inc.prt.\r\n', 0, 0),
(2, 315, 'Premio de seguro MIP incorp. à prestação', 'pr.sg.MIP inc.fin.\r\n', 0, 0),
(2, 316, 'Premio de seguro DFI incorp. à prestação', 'pr.sg.DFI inc.fin.\r\n', 0, 0),
(2, 330, 'Diferença positiva sobre o principal da prestação', 'Dif.pos.pcp.prest\r\n', 0, 0),
(2, 340, 'Diferenças negativas', 'Dif Negativa\r\n', 0, 0),
(2, 350, 'Diferenças negativas de taxas', 'Dif Neg.taxa\r\n', 0, 0),
(2, 351, 'Diferenças negativas de premio de seguro', 'Dif Neg.Pr Seg\r\n', 0, 0),
(2, 352, 'Diferença do principal da prestação', 'Dif pcp prest\r\n', 0, 0),
(2, 360, 'Diferença dos juros contratuais da prestação', 'Dif Js Prest\r\n', 0, 0),
(2, 370, 'Diferença de TAV incorp. à prestação', 'Dif.TAV inc\r\n', 0, 0),
(2, 371, 'Diferença de TVI incorp. à prestação', 'Dif.TVI inc\r\n', 0, 0),
(2, 372, 'Diferença de TAD incorp. à prestação', 'Dif.TAD inc\r\n', 0, 0),
(2, 373, 'Diferença de TAO incorp. à prestação', 'Dif.TAO inc\r\n', 0, 0),
(2, 374, 'Diferença de TOM incorp. à prestação', 'Dif.TOM inc\r\n', 0, 0),
(2, 375, 'Diferença de TAC incorp. à prestação', 'Dif.TAC inc\r\n', 0, 0),
(2, 376, 'Diferença de TRC incorp. à prestação', 'Dif.TRC inc\r\n', 0, 0),
(2, 377, 'Diferença de TCA incorp. à prestação', 'Dif.TCA inc\r\n', 0, 0),
(2, 378, 'Diferença de TAIS incorp. à prestação', 'Dif.TAIS inc\r\n', 0, 0),
(2, 379, 'Diferença de TAR incorp. à prestação', 'Dif.TAR inc\r\n', 0, 0),
(2, 380, 'Diferença de TOI incorp. à prestação', 'Dif.TOI inc\r\n', 0, 0),
(2, 381, 'Diferença de TOC incorp. à prestação', 'Dif.TOC inc\r\n', 0, 0),
(2, 382, 'Diferença de TCRA - incorp. à prestação', 'Dif.TCRA inc\r\n', 0, 0),
(2, 383, 'Diferença de TCRE incorp. à prestação', 'Dif.TCRE inc\r\n', 0, 0),
(2, 384, 'Diferença de TCC incorp. à prestação', 'Dif.TCC inc\r\n', 0, 0),
(2, 385, 'Diferença de TMC incorp. à prestação', 'Dif.TMC inc\r\n', 0, 0),
(2, 386, 'Diferença de TEQ incorp. à prestação', 'Dif.TEQC inc\r\n', 0, 0),
(2, 387, 'Diferença de TESFH incorp. à prestação', 'Dif.TESFH inc\r\n', 0, 0),
(2, 400, 'Diferença de Pr. seguro SCI1 incorp. à prest.', 'Dif.Pr. seg SCI1 inc\r\n', 0, 0),
(2, 401, 'Diferença de Pr. seguro SCI2 incorp. à prest', 'Dif.Pr. seg SCI2 inc\r\n', 0, 0),
(2, 402, 'Diferença de Pr.seguro MIP incorp. à prest', 'Dif.Pr. seg MIP inc\r\n', 0, 0),
(2, 403, 'Diferença de Pr. seguro DFI incorp. à prest', 'Dif.Pr. seg DFI inc\r\n', 0, 0),
(3, 10, 'Não definido', '\r\n', 0, 0),
(3, 20, 'Valor', 'Valor\r\n', 0, 0),
(3, 30, 'Aporte de Capital', 'apt.cap.\r\n', 0, 0),
(3, 40, 'Financiamento', 'financ.\r\n', 0, 0),
(3, 50, 'Valor bruto', 'vr.brt\r\n', 0, 0),
(3, 60, 'Valor líquido', 'vr.liq.\r\n', 0, 0),
(3, 70, 'Saldo devedor do cliente', 'sd.dev.\r\n', 0, 0),
(3, 80, 'Correção Monetária', 'CM\r\n', 0, 0),
(3, 90, 'Juros Contratuais', 'jrs.cto\r\n', 0, 0),
(3, 100, 'Juros remuneratórios', 'jrs.rem.\r\n', 0, 0),
(3, 110, 'Juros compensatórios', 'jrs.cmp.\r\n', 0, 0),
(3, 120, 'Juros moratórios', 'jrs.mor.\r\n', 0, 0),
(3, 130, 'Multa', 'mta\r\n', 0, 0),
(3, 140, 'Comissão de Permanência', 'c.perm.\r\n', 0, 0),
(3, 150, 'IOF', 'IOF\r\n', 0, 0),
(3, 151, 'IOF à vista', 'IOF vst\r\n', 0, 0),
(3, 152, 'IOF incorporado ao financiamento', 'IOF inc\r\n', 0, 0),
(3, 160, 'Principal do financiamento', 'pcp finan.\r\n', 0, 0),
(3, 161, 'Principal da prestação', 'pcp.prst.\r\n', 0, 0),
(3, 162, 'Juros contratuais incorp à prestação', 'jrs.prst.\r\n', 0, 0),
(3, 163, 'Prestação', 'prst.\r\n', 0, 0),
(3, 164, 'Principal FGTS', 'pcp.FGTS\r\n', 0, 0),
(3, 165, 'Saldo FGTS', 'sdo.FGTS\r\n', 0, 0),
(3, 166, 'Valor de FGTS', 'vr.FGTS\r\n', 0, 0),
(3, 167, 'Garantia carta de fianca', 'grnta Fianca\r\n', 0, 0),
(3, 168, 'Garantia imóvel rural', 'grnta Imov Rural\r\n', 0, 0),
(3, 169, 'Garantia imóvel urbano', 'grnta Imov Urb\r\n', 0, 0),
(3, 170, 'Garantia automóvel', 'grnta Autom\r\n', 0, 0),
(3, 171, 'Garantia precatórios Uniao', 'grnta Prec UF\r\n', 0, 0),
(3, 175, 'Taxas', 'tx.\r\n', 0, 0),
(3, 180, 'TAV - Taxa de avaliação', 'TAV\r\n', 0, 0),
(3, 181, 'TVI - Taxa de Vistoria', 'TVI\r\n', 0, 0),
(3, 182, 'TAD -Taxa de Administração', 'TAD\r\n', 0, 0),
(3, 183, 'TAO - Tarifa Operacional', 'TAO \r\n', 0, 0),
(3, 184, 'TOM - Taxa Operacional Mensal', 'TOM\r\n', 0, 0),
(3, 185, 'TAC - Taxa de Abertura de Crédito', 'TAC\r\n', 0, 0),
(3, 186, 'TRC -Taxa de Risco de Crédito', 'TRC\r\n', 0, 0),
(3, 187, 'TCA - Taxa de cobrança p/ Administração', 'TCA\r\n', 0, 0),
(3, 188, 'TAIS - Taxa de Arrend. imóvel substituído', 'TAIS\r\n', 0, 0),
(3, 189, 'TAR - Taxa de arrendamento', 'TAR\r\n', 0, 0),
(3, 190, 'TOI - Taxa de Ocupação Irregular', 'TOI\r\n', 0, 0),
(3, 191, 'TOC - Taxa de Ociosodade', 'TOC\r\n', 0, 0),
(3, 192, 'TCRA - Taxa de Crédito e Administração', 'TCRA\r\n', 0, 0),
(3, 193, 'TCRE - Taxa de Crédito', 'TCRE\r\n', 0, 0),
(3, 194, 'TCC - Taxa de Cobertura de Custos', 'TCC\r\n', 0, 0),
(3, 195, 'TMC - Taxa de Manutenção', 'TMC\r\n', 0, 0),
(3, 196, 'TEQ - Taxa de Equalização', 'TEQ\r\n', 0, 0),
(3, 197, 'TESFH - Taxa de Enquadramento no SFH', 'TESFH\r\n', 0, 0),
(3, 210, 'TAV - Taxa de avaliação à vista', 'TAV\r\n', 0, 0),
(3, 211, 'TVI - Taxa de Vistoria à vista', 'TVI\r\n', 0, 0),
(3, 212, 'TAD -Taxa de Administração à vista', 'TAD\r\n', 0, 0),
(3, 213, 'TAO - Tarifa Operacional à vista', 'TAO\r\n', 0, 0),
(3, 214, 'TOM - Taxa Operacional Mensal à vista', 'TOM\r\n', 0, 0),
(3, 215, 'TAC - Taxa de Abertura de Crédito à vista', 'TAC\r\n', 0, 0),
(3, 216, 'TRC -Taxa de Risco de Crédito à vista', 'TRC\r\n', 0, 0),
(3, 217, 'TCA - Taxa de cobrança p/ Administração à vista', 'TCA\r\n', 0, 0),
(3, 218, 'TAIS - Taxa de Arrend. imóvel substituído à vista', 'TAIS\r\n', 0, 0),
(3, 219, 'TAR - Taxa de arrendamento à vista', 'TAR\r\n', 0, 0),
(3, 220, 'TOI - Taxa de Ocupação Irregular à vista', 'TOI\r\n', 0, 0),
(3, 221, 'TOC - Taxa de Ociosodade à vista', 'TOC\r\n', 0, 0),
(3, 222, 'TCRA - Taxa de Crédito e Administração à vista', 'TCRA\r\n', 0, 0),
(3, 223, 'TCRE - Taxa de Crédito à vista', 'TCRE\r\n', 0, 0),
(3, 224, 'TCC - Taxa de Cobertura de Custos à vista', 'TCC\r\n', 0, 0),
(3, 225, 'TMC - Taxa de Manutenção à vista', 'TMC\r\n', 0, 0),
(3, 226, 'TEQ - Taxa de Equalização à vista', 'TEQ \r\n', 0, 0),
(3, 227, 'TESFH - Taxa de Enquadramento no SFH à vista', 'TESFH \r\n', 0, 0),
(3, 240, 'TAV - Taxa de avaliação - incorp. ao financ.', 'TAV\r\n', 0, 0),
(3, 241, 'TVI - Taxa de Vistoria - incorp. ao financ.', 'TVI\r\n', 0, 0),
(3, 242, 'TAD -Taxa de Administração - incorp. ao financ.', 'TAD\r\n', 0, 0),
(3, 243, 'TAO - Tarifa Operacional - incorp. ao financ.', 'TAO\r\n', 0, 0),
(3, 244, 'TOM - Taxa Operacional Mensal - incorp. ao financ.', 'TOM\r\n', 0, 0),
(3, 245, 'TAC - Taxa de Abertura de Crédito - incorp. ao financ.', 'TAC\r\n', 0, 0),
(3, 246, 'TRC -Taxa de Risco de Crédito - incorp. ao financ.', 'TRC\r\n', 0, 0),
(3, 247, 'TCA - Taxa de cobrança p/ Adm. - incorp. ao financ.', 'TCA\r\n', 0, 0),
(3, 248, 'TAIS - Taxa de Arrend. imóvel subst. - incorp. ao financ.', 'TAIS\r\n', 0, 0),
(3, 249, 'TAR - Taxa de arrendamento - incorp. ao financ.', 'TAR\r\n', 0, 0),
(3, 250, 'TOI - Taxa de Ocupação Irregular - incorp. ao financ.', 'TOI\r\n', 0, 0),
(3, 251, 'TOC - Taxa de Ociosodade - incorp. ao financ.', 'TOC\r\n', 0, 0),
(3, 252, 'TCRA - Taxa de Crédito e Adm. - incorp. ao financ.', 'TCRA\r\n', 0, 0),
(3, 253, 'TCRE - Taxa de Crédito - incorp. ao financ.', 'TCRE\r\n', 0, 0),
(3, 254, 'TCC - Taxa de Cobert. Custos - incorp. ao financ.', 'TCC\r\n', 0, 0),
(3, 255, 'TMC - Taxa de Manutenção - incorp. ao financ.', 'TMC\r\n', 0, 0),
(3, 256, 'TEQ - Taxa de Equalização - incorp. ao financ.', 'TEQ\r\n', 0, 0),
(3, 257, 'TESFH - Taxa de Enquad. SFH - incorp. ao financ.', 'TESFH \r\n', 0, 0),
(3, 270, 'TAV - Taxa de avaliação incorp. à prestação', 'TAV\r\n', 0, 0),
(3, 271, 'TVI - Taxa de Vistoria incorp. à prestação', 'TVI\r\n', 0, 0),
(3, 272, 'TAD -Taxa de Administração incorp. à prestação', 'TAD\r\n', 0, 0),
(3, 273, 'TAO - Tarifa Operacional incorp. à prestação', 'TAO\r\n', 0, 0),
(3, 274, 'TOM - Taxa Operacional Mensal incorp. à prestação', 'TOM\r\n', 0, 0),
(3, 275, 'TAC - Taxa de Abertura de Crédito incorp. à prestação', 'TAC\r\n', 0, 0),
(3, 276, 'TRC -Taxa de Risco de Crédito incorp. à prestação', 'TRC\r\n', 0, 0),
(3, 277, 'TCA - Taxa de cobrança p/ Adm. incorp. à prestação', 'TCA\r\n', 0, 0),
(3, 278, 'TAIS - Taxa de Arrend. imóvel subst.  incorp. à prestação', 'TAIS\r\n', 0, 0),
(3, 279, 'TAR - Taxa de arrendamento incorp. à prestação', 'TAR\r\n', 0, 0),
(3, 280, 'TOI - Taxa de Ocupação Irregular incorp. à prestação', 'TOI\r\n', 0, 0),
(3, 281, 'TOC - Taxa de Ociosodade incorp. à prestação', 'TOC\r\n', 0, 0),
(3, 282, 'TCRA - Taxa de Crédito e Adm. - incorp. à prestação', 'TCRA\r\n', 0, 0),
(3, 283, 'TCRE - Taxa de Crédito - incorp. à prestação', 'TCRE\r\n', 0, 0),
(3, 284, 'TCC - Taxa de Cobert. Custos - incorp. à prestação', 'TCC\r\n', 0, 0),
(3, 285, 'TMC - Taxa de Manutenção - incorp. à prestação', 'TMC\r\n', 0, 0),
(3, 286, 'TEQ - Taxa de Equalização - incorp. à prestação', 'TEQ\r\n', 0, 0),
(3, 287, 'TESFH - Taxa de Enquad.SFH - incorp. à prestação', 'TESFH\r\n', 0, 0),
(3, 300, 'Premios de seguro', 'prem.seg.\r\n', 0, 0),
(3, 301, 'Premio de seguro SCI1', 'pr.seg.SCI1\r\n', 0, 0),
(3, 302, 'Premio de seguro SCI2', 'pr.seg.SCI2\r\n', 0, 0),
(3, 303, 'Premio de seguro MIP', 'pr.seg.MIP\r\n', 0, 0),
(3, 304, 'Premio de seguro DFI', 'pr.seg.DFI\r\n', 0, 0),
(3, 305, 'Premio de seguro SCI1 à vista', 'pr.sg.SCI1 Vst.\r\n', 0, 0),
(3, 306, 'Premio de seguro SCI2 à vista', 'pr.sg.SCI2 Vst.\r\n', 0, 0),
(3, 307, 'Premio de seguro MIP à vista', 'pr.sg.MIP Vst.\r\n', 0, 0),
(3, 308, 'Premio de seguro DFI à vista', 'pr.sg.DFI Vst.\r\n', 0, 0),
(3, 309, 'Premio de seguro SCI1 incorp. ao financiamento', 'pr.sg.SCI1 inc.fin.\r\n', 0, 0),
(3, 310, 'Premio de seguro SCI2 incorp. ao financiamento', 'pr.sg.SCI2 inc.fin.\r\n', 0, 0),
(3, 311, 'Premio de seguro MIP incorp. ao financiamento', 'pr.sg.MIP inc.fin.\r\n', 0, 0),
(3, 312, 'Premio de seguro DFI incorp. ao financiamento', 'pr.sg.DFI inc.fin.\r\n', 0, 0),
(3, 313, 'Premio de seguro SCI1 incorp. à prestação', 'pr.sg.SCI1 inc.prt.\r\n', 0, 0),
(3, 314, 'Premio de seguro SCI2 incorp. à prestação', 'pr.sg.SCI2 inc.prt.\r\n', 0, 0),
(3, 315, 'Premio de seguro MIP incorp. à prestação', 'pr.sg.MIP inc.fin.\r\n', 0, 0),
(3, 316, 'Premio de seguro DFI incorp. à prestação', 'pr.sg.DFI inc.fin.\r\n', 0, 0),
(3, 330, 'Diferença positiva sobre o principal da prestação', 'Dif.pos.pcp.prest\r\n', 0, 0),
(3, 340, 'Diferenças negativas', 'Dif Negativa\r\n', 0, 0),
(3, 350, 'Diferenças negativas de taxas', 'Dif Neg.taxa\r\n', 0, 0),
(3, 351, 'Diferenças negativas de premio de seguro', 'Dif Neg.Pr Seg\r\n', 0, 0),
(3, 352, 'Diferença do principal da prestação', 'Dif pcp prest\r\n', 0, 0),
(3, 360, 'Diferença dos juros contratuais da prestação', 'Dif Js Prest\r\n', 0, 0),
(3, 370, 'Diferença de TAV incorp. à prestação', 'Dif.TAV inc\r\n', 0, 0),
(3, 371, 'Diferença de TVI incorp. à prestação', 'Dif.TVI inc\r\n', 0, 0),
(3, 372, 'Diferença de TAD incorp. à prestação', 'Dif.TAD inc\r\n', 0, 0),
(3, 373, 'Diferença de TAO incorp. à prestação', 'Dif.TAO inc\r\n', 0, 0),
(3, 374, 'Diferença de TOM incorp. à prestação', 'Dif.TOM inc\r\n', 0, 0),
(3, 375, 'Diferença de TAC incorp. à prestação', 'Dif.TAC inc\r\n', 0, 0),
(3, 376, 'Diferença de TRC incorp. à prestação', 'Dif.TRC inc\r\n', 0, 0),
(3, 377, 'Diferença de TCA incorp. à prestação', 'Dif.TCA inc\r\n', 0, 0),
(3, 378, 'Diferença de TAIS incorp. à prestação', 'Dif.TAIS inc\r\n', 0, 0),
(3, 379, 'Diferença de TAR incorp. à prestação', 'Dif.TAR inc\r\n', 0, 0),
(3, 380, 'Diferença de TOI incorp. à prestação', 'Dif.TOI inc\r\n', 0, 0),
(3, 381, 'Diferença de TOC incorp. à prestação', 'Dif.TOC inc\r\n', 0, 0),
(3, 382, 'Diferença de TCRA - incorp. à prestação', 'Dif.TCRA inc\r\n', 0, 0),
(3, 383, 'Diferença de TCRE incorp. à prestação', 'Dif.TCRE inc\r\n', 0, 0),
(3, 384, 'Diferença de TCC incorp. à prestação', 'Dif.TCC inc\r\n', 0, 0),
(3, 385, 'Diferença de TMC incorp. à prestação', 'Dif.TMC inc\r\n', 0, 0),
(3, 386, 'Diferença de TEQ incorp. à prestação', 'Dif.TEQC inc\r\n', 0, 0),
(3, 387, 'Diferença de TESFH incorp. à prestação', 'Dif.TESFH inc\r\n', 0, 0),
(3, 400, 'Diferença de Pr. seguro SCI1 incorp. à prest.', 'Dif.Pr. seg SCI1 inc\r\n', 0, 0),
(3, 401, 'Diferença de Pr. seguro SCI2 incorp. à prest', 'Dif.Pr. seg SCI2 inc\r\n', 0, 0),
(3, 402, 'Diferença de Pr.seguro MIP incorp. à prest', 'Dif.Pr. seg MIP inc\r\n', 0, 0),
(3, 403, 'Diferença de Pr. seguro DFI incorp. à prest', 'Dif.Pr. seg DFI inc\r\n', 0, 0),
(4, 10, 'Não definido\r\n', NULL, 0, 0),
(4, 20, 'Patrocinador do financiamento\r\n', NULL, 0, 0),
(4, 30, 'Saldo para Financiamento\r\n', NULL, 0, 0),
(4, 40, 'Caixa Econômica Federal\r\n', NULL, 0, 0),
(4, 50, 'CAIXA do PV\r\n', NULL, 0, 0),
(4, 60, 'Receita Federal\r\n', NULL, 0, 0),
(4, 70, 'Saldo da Receita Federal\r\n', NULL, 0, 0),
(4, 80, 'Cliente\r\n', NULL, 0, 0),
(4, 90, 'Saldo Devedor do Cliente\r\n', NULL, 0, 0),
(4, 100, 'Saldo de Prestações do Cliente\r\n', NULL, 0, 0),
(4, 110, 'Sdo Dif. Prestações do Cliente\r\n', NULL, 0, 0),
(4, 111, 'Sdo Dif. Prestações Agendadas do cliente\r\n', NULL, 0, 0),
(4, 112, 'Saldo de FGTS do cliente\r\n', NULL, 0, 0),
(4, 120, 'Saldo de Garantias do Cliente\r\n', NULL, 0, 0),
(4, 130, 'Saldo de Prejuízo do cliente\r\n', NULL, 0, 0),
(4, 140, 'Seguradora\r\n', NULL, 0, 0),
(4, 150, 'Saldo da Seguradora\r\n', NULL, 0, 0),
(4, 160, 'FGTS\r\n', NULL, 0, 0),
(4, 170, 'Conta Orçamentaria 1\r\n', NULL, 0, 0),
(4, 180, 'Conta Orçamentaria 2\r\n', NULL, 0, 0),
(4, 190, 'Conta Orçamentaria 3\r\n', NULL, 0, 0),
(4, 200, 'Conta Orçamentaria 4\r\n', NULL, 0, 0),
(4, 210, 'Conta Orçamentaria 5\r\n', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `momentos`
--

CREATE TABLE IF NOT EXISTS `momentos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(200) NOT NULL,
  `matricula` int(5) NOT NULL,
  `c_time` int(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `momentos`
--

INSERT INTO `momentos` (`codigo`, `nome`, `matricula`, `c_time`) VALUES
(2, 'Momento Teste', 2, 1279740526),
(3, 'Momento Tito', 7, 1288556052),
(4, 'Gerar Prestação', 7, 1288964142),
(5, 'Momento Vazio', 7, 1288981030);

-- --------------------------------------------------------

--
-- Table structure for table `parcelas`
--

CREATE TABLE IF NOT EXISTS `parcelas` (
  `NU-PARCELA` smallint(6) DEFAULT NULL,
  `NU-PRESTACAO` smallint(6) DEFAULT NULL,
  `NU-FONTE-PROPOSTA` smallint(6) DEFAULT NULL,
  `NU-UNDDE-PROPOSTA` smallint(6) DEFAULT NULL,
  `NU-NTRL-PROPOSTA` int(11) DEFAULT NULL,
  `NU-SQNCL-PROPOSTA` int(11) DEFAULT NULL,
  `NU-TIPO-PARCELA` smallint(6) DEFAULT NULL,
  `DT-GERACAO` date DEFAULT NULL,
  `DT-VENCIMENTO` date DEFAULT NULL,
  `VR-PRESTACAO` decimal(14,2) DEFAULT NULL,
  `VR-RECEBIDO` decimal(14,2) DEFAULT NULL,
  `DT-RECEBIMENTO` date DEFAULT NULL,
  `NU-UNIDADE-RCBDA` smallint(6) DEFAULT NULL,
  `NU-NATURAL-RCBDA` int(11) DEFAULT NULL,
  `IC-CANCELADA` char(1) DEFAULT NULL,
  `IC-ESTORNO` char(1) DEFAULT NULL,
  `IC-DIFERENCA` char(1) DEFAULT NULL,
  `IC-RECLASSIFICACAO` char(1) DEFAULT NULL,
  `CO-FORMA-RCBTO` char(1) DEFAULT NULL,
  `CO-USUARIO` char(8) DEFAULT NULL,
  `CO-TERMINAL` char(15) DEFAULT NULL,
  `CO-APLICACAO` char(8) DEFAULT NULL,
  `TS-CNTRE-ATLZO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcelas`
--


-- --------------------------------------------------------

--
-- Table structure for table `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `COD_PARTICIPANTE` int(11) NOT NULL AUTO_INCREMENT,
  `NU_CONTRATO` int(200) NOT NULL,
  `TIPO_PARTICIPANTE` int(5) NOT NULL,
  `NOME_PARTICIPANTE` varchar(255) NOT NULL,
  `DT_NASCIMENTO` date NOT NULL,
  `origem_destino` int(4) NOT NULL,
  `endereço` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `cpf/cnpj` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `renda` decimal(5,2) NOT NULL,
  PRIMARY KEY (`COD_PARTICIPANTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `participantes`
--

INSERT INTO `participantes` (`COD_PARTICIPANTE`, `NU_CONTRATO`, `TIPO_PARTICIPANTE`, `NOME_PARTICIPANTE`, `DT_NASCIMENTO`, `origem_destino`, `endereço`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `telefone`, `cep`, `cpf/cnpj`, `email`, `renda`) VALUES
(3, 0, 2, 'Vitor3', '0000-00-00', 10, 'Xxx', 10, 'aa', 'aaa', 'aaa', 'DF', '(31) 1111-1111', '11111-111', '133.810.756-91', 'a@a.com.br', '72.15');

-- --------------------------------------------------------

--
-- Table structure for table `participante_contrato`
--

CREATE TABLE IF NOT EXISTS `participante_contrato` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `COD_PARTICIPANTE` int(6) NOT NULL,
  `NU_CONTRATO` int(6) NOT NULL,
  `TIPO_PARTICIPANTE` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `participante_contrato`
--

INSERT INTO `participante_contrato` (`id`, `COD_PARTICIPANTE`, `NU_CONTRATO`, `TIPO_PARTICIPANTE`) VALUES
(1, 3, 1, 0),
(2, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roteiro`
--

CREATE TABLE IF NOT EXISTS `roteiro` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `acao_cod` int(5) NOT NULL DEFAULT '0',
  `objeto_cod` int(5) NOT NULL DEFAULT '0',
  `alvo_cod` int(5) NOT NULL DEFAULT '0',
  `origem_cod` int(5) NOT NULL DEFAULT '0',
  `destino_cod` int(5) NOT NULL DEFAULT '0',
  `frase` text NOT NULL,
  `rotulo` text NOT NULL,
  `sl` int(1) NOT NULL DEFAULT '0',
  `codigo_contabil` varchar(255) NOT NULL DEFAULT 'nulo',
  `inicio_vigencia` int(30) NOT NULL DEFAULT '315543600',
  `fim_vigencia` int(30) NOT NULL DEFAULT '1609380000',
  `ic_cancelado` varchar(255) NOT NULL DEFAULT 'N',
  `ic_recente` varchar(255) NOT NULL DEFAULT 'S',
  `nome_programa` varchar(255) NOT NULL DEFAULT 'nulo',
  `matricula` int(5) NOT NULL,
  `c_time` int(30) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `roteiro`
--


-- --------------------------------------------------------

--
-- Table structure for table `roteiro_sistema_momento`
--

CREATE TABLE IF NOT EXISTS `roteiro_sistema_momento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_roteiro` int(5) NOT NULL,
  `cod_sistema` int(5) NOT NULL,
  `cod_momento` int(5) NOT NULL,
  `matricula` int(5) NOT NULL,
  `c_time` int(30) NOT NULL,
  PRIMARY KEY (`id`,`cod_roteiro`,`cod_sistema`,`cod_momento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `roteiro_sistema_momento`
--


-- --------------------------------------------------------

--
-- Table structure for table `saldo_contrato`
--

CREATE TABLE IF NOT EXISTS `saldo_contrato` (
  `NU_MOVIMENTO` decimal(12,0) DEFAULT NULL,
  `DT_MOVIMENTO` date DEFAULT NULL,
  `NU_ACAO` smallint(6) DEFAULT NULL,
  `NU_OBJETO` smallint(6) DEFAULT NULL,
  `NU_ALVO` smallint(6) DEFAULT NULL,
  `NU_ORIGEM` smallint(6) DEFAULT NULL,
  `NU_DESTINO` smallint(6) DEFAULT NULL,
  `NU_PRODUTO` smallint(6) DEFAULT NULL,
  `NU_CONTRATO` smallint(6) DEFAULT NULL,
  `NU_AGENCIA` smallint(6) DEFAULT NULL,
  `VR_SALDO` decimal(14,2) DEFAULT NULL,
  `IC_CANCELADO` char(1) DEFAULT NULL,
  `IC_MAIS_RECENTE` char(1) DEFAULT NULL,
  `IC_INCORPORADO` char(1) DEFAULT NULL,
  `DT_RETORNO_SIDEC` char(8) DEFAULT NULL,
  `CO_USUARIO` char(15) DEFAULT NULL,
  `CO_TERMINAL` char(8) DEFAULT NULL,
  `CO_APLICACAO` char(8) DEFAULT NULL,
  `TS_MOVIMENTO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo_contrato`
--


-- --------------------------------------------------------

--
-- Table structure for table `saldo_fgts`
--

CREATE TABLE IF NOT EXISTS `saldo_fgts` (
  `NU_MOVIMENTO` decimal(12,0) DEFAULT NULL,
  `DT_MOVIMENTO` date DEFAULT NULL,
  `NU_ACAO` smallint(6) DEFAULT NULL,
  `NU_OBJETO` smallint(6) DEFAULT NULL,
  `NU_ALVO` smallint(6) DEFAULT NULL,
  `NU_ORIGEM` smallint(6) DEFAULT NULL,
  `NU_DESTINO` smallint(6) DEFAULT NULL,
  `NU_PRODUTO` smallint(6) DEFAULT NULL,
  `NU_CONTRATO` smallint(6) DEFAULT NULL,
  `NU_AGENCIA` smallint(6) DEFAULT NULL,
  `VR_SALDO` decimal(14,2) DEFAULT NULL,
  `IC_CANCELADO` char(1) DEFAULT NULL,
  `IC_MAIS_RECENTE` char(1) DEFAULT NULL,
  `IC_INCORPORADO` char(1) DEFAULT NULL,
  `DT_RETORNO_SIDEC` char(8) DEFAULT NULL,
  `CO_USUARIO` char(15) DEFAULT NULL,
  `CO_TERMINAL` char(8) DEFAULT NULL,
  `CO_APLICACAO` char(8) DEFAULT NULL,
  `TS_MOVIMENTO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo_fgts`
--


-- --------------------------------------------------------

--
-- Table structure for table `sistemas`
--

CREATE TABLE IF NOT EXISTS `sistemas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` char(10) NOT NULL,
  `nome` char(200) NOT NULL,
  `matricula` int(5) NOT NULL,
  `c_time` int(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sistemas`
--

INSERT INTO `sistemas` (`codigo`, `sigla`, `nome`, `matricula`, `c_time`) VALUES
(1, 'CI', 'Crédito Imobiliário', 2, 1279631162);

-- --------------------------------------------------------

--
-- Table structure for table `tabela_contrato`
--

CREATE TABLE IF NOT EXISTS `tabela_contrato` (
  `NU_CONTRATO` smallint(6) NOT NULL AUTO_INCREMENT,
  `NU-UNDDE-PROPOSTA` smallint(6) DEFAULT NULL,
  `NU-NTRL-PROPOSTA` int(11) DEFAULT NULL,
  `NU-SQNCL-PROPOSTA` int(11) DEFAULT NULL,
  `NU-DIGITO-VRFCR` smallint(6) DEFAULT NULL,
  `NU-ITEM-PRODUTO` decimal(12,0) DEFAULT NULL,
  `NU-VERSAO` smallint(6) DEFAULT NULL,
  `TS-CRIACAO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TS-ATUALIZACAO` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CO-USUARIO-RSPNL` char(8) DEFAULT NULL,
  `IC-TIPO-PROPOSTA` char(1) DEFAULT NULL,
  `IC-STCO-PROPOSTA` char(1) DEFAULT NULL,
  `NU-AVLO-RSCO-PRPNE` decimal(9,0) DEFAULT NULL,
  `NU-UNIDADE-CBRNA` smallint(6) DEFAULT NULL,
  `NU-NATURAL-CBRNA` int(11) DEFAULT NULL,
  `IC-TIPO-DESTINO` char(1) DEFAULT NULL,
  `NU-UNIDADE-DESTINO` smallint(6) DEFAULT NULL,
  `NU-NATURAL-DESTINO` int(11) DEFAULT NULL,
  `NU-CELULA-ORIGEM` int(11) DEFAULT NULL,
  `NU-CELULA-DESTINO` int(11) DEFAULT NULL,
  `NU-CONVENIO-CB` int(11) DEFAULT NULL,
  `NU-CRITERIO-EXCCO` smallint(6) DEFAULT NULL,
  `NU-CODIGO-LGSLO` smallint(6) DEFAULT NULL,
  `NU-CRITERIO-CTRTO` smallint(6) DEFAULT NULL,
  `PZ-CONSTRUCAO` smallint(6) DEFAULT NULL,
  `TS-TRNSA-PROPOSTA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `IC-ACEITE-TRNSA` char(1) DEFAULT NULL,
  `TS-ENCTO-PROPOSTA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `IC-RCBMO-ENCTO` char(1) DEFAULT NULL,
  `IC-MOTIVO-SUSPENSAO` char(1) DEFAULT NULL,
  `NU-MTVO-CNCLO-PRPA` smallint(6) DEFAULT NULL,
  `NU-CONTRATO-SIACI` decimal(13,0) DEFAULT NULL,
  `DT-ASSINATURA` date DEFAULT NULL,
  `IC-ENVIO-SIACI` char(1) DEFAULT NULL,
  `DT-CANCELAMENTO` date DEFAULT NULL,
  `IC_ETAPA` char(1) DEFAULT NULL,
  `NU_FNTE_PRPSA_EMPO` smallint(6) DEFAULT NULL,
  `NU_UNDE_PRPSA_EMPO` smallint(6) DEFAULT NULL,
  `NU_NTRL_PRPSA_EMPO` int(11) DEFAULT NULL,
  `NU_SQNL_PRPSA_EMPO` int(11) DEFAULT NULL,
  `NU_EMPREENDIMENTO` int(11) DEFAULT NULL,
  `NU_UNIDADE_HBTCL` int(11) DEFAULT NULL,
  `IC_DESATIVA_FGTS` char(1) DEFAULT NULL,
  `QT_PARCELAS` smallint(6) DEFAULT NULL,
  `IC_AQSO_IMVL_FNNDO` char(1) DEFAULT NULL,
  `IC_IMVL_FNNDO_CXA` char(1) DEFAULT NULL,
  `IC_CONVENIO` char(1) DEFAULT NULL,
  `IC_PACOTE_BASICO` char(1) DEFAULT NULL,
  `IC_TIPO_CONCESSAO` char(3) DEFAULT NULL,
  `DT_AGNDO_ASNTA` date DEFAULT NULL,
  `DT_LMTE_AGNO_ASNTA` date DEFAULT NULL,
  `DT_VENCIMENTO` date DEFAULT NULL,
  `DT_VNCMO_ALTERADA` date DEFAULT NULL,
  `DE_RESSALVA_INSNO` varchar(2500) DEFAULT NULL,
  `DE_IMPOSTO_ENCARGO` varchar(500) DEFAULT NULL,
  `PZ_AMRTO_NEGOCIADO` smallint(6) DEFAULT NULL,
  `PZ_PRORROGACAO` smallint(6) DEFAULT NULL,
  `PZ_REMANESCENTE` smallint(6) DEFAULT NULL,
  `PZ_ARRENDAMENTO` smallint(6) DEFAULT NULL,
  `PZ_DECORRIDO` smallint(6) DEFAULT NULL,
  `PZ_INTEGRALIZACAO` smallint(6) DEFAULT NULL,
  `IC_CARTA_CREDITO` char(1) DEFAULT NULL,
  `NU_MUNICIPIO_PRTNO` int(11) DEFAULT NULL,
  `NU_OPERACAO_FGTS` decimal(15,0) DEFAULT NULL,
  `NU_CONTRATO_SIACI` decimal(13,0) DEFAULT NULL,
  `IC_RCBO_CTRO_RGSO` char(1) DEFAULT NULL,
  `IC_RESSALVA` char(1) DEFAULT NULL,
  `DE_OBSERVACAO_FNLO` varchar(256) DEFAULT NULL,
  `IC_VLR_DSBQO_SIAEF` char(1) DEFAULT NULL,
  `DT_DESBLOQUEIO` date DEFAULT NULL,
  `BLOQ1` char(1) NOT NULL,
  `BLOQ2` char(1) NOT NULL,
  `BLOQ3` char(1) NOT NULL,
  `BLOQ4` char(1) NOT NULL,
  `BLOQ5` char(1) NOT NULL,
  `BLOQ6` char(1) NOT NULL,
  `BLOQ7` char(1) NOT NULL,
  `BLOQ8` char(1) NOT NULL,
  `BLOQ9` char(1) NOT NULL,
  `BLOQ10` char(1) NOT NULL,
  PRIMARY KEY (`NU_CONTRATO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabela_contrato`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabela_movimento`
--

CREATE TABLE IF NOT EXISTS `tabela_movimento` (
  `NU_MOVIMENTO` decimal(12,0) DEFAULT NULL,
  `DT_MOVIMENTO` date DEFAULT NULL,
  `NU_ACAO` smallint(6) DEFAULT NULL,
  `NU_OBJETO` smallint(6) DEFAULT NULL,
  `NU_ALVO` smallint(6) DEFAULT NULL,
  `NU_ORIGEM` smallint(6) DEFAULT NULL,
  `NU_DESTINO` smallint(6) DEFAULT NULL,
  `NU_PRODUTO` smallint(6) DEFAULT NULL,
  `NU_FONTE_PROPOSTA` smallint(6) DEFAULT NULL,
  `NU_UNDDE_PROPOSTA` smallint(6) DEFAULT NULL,
  `NU_NTRL_PROPOSTA` int(11) DEFAULT NULL,
  `NU_SQNCL_PROPOSTA` int(11) DEFAULT NULL,
  `NU_SEGMENTO` smallint(6) DEFAULT NULL,
  `CO_CARTEIRA` char(4) DEFAULT NULL,
  `NU_FONTE_RECURSO` smallint(6) DEFAULT NULL,
  `NU_CANAL` decimal(2,0) DEFAULT NULL,
  `NU_OCORRENCIA` smallint(6) DEFAULT NULL,
  `NU_PARCELA` smallint(6) DEFAULT NULL,
  `VR_MOVIMENTO` decimal(14,2) DEFAULT NULL,
  `IC_CANCELADO` char(1) DEFAULT NULL,
  `IC_MAIS_RECENTE` char(1) DEFAULT NULL,
  `IC_INCORPORADO` char(1) DEFAULT NULL,
  `IC_EFETIVA_AGENDA` char(1) DEFAULT NULL,
  `IC_ESTORNADO` char(1) DEFAULT NULL,
  `NU_UNIDADE_ORIGEM` smallint(6) DEFAULT NULL,
  `NU_NATURAL_ORIGEM` int(11) DEFAULT NULL,
  `NU_UNIDADE_DESTINO` smallint(6) DEFAULT NULL,
  `NU_NATURAL_DESTINO` int(11) DEFAULT NULL,
  `NU_UNIDADE_RCBTO` smallint(6) DEFAULT NULL,
  `NU_NATURAL_RCBTO` int(11) DEFAULT NULL,
  `DT_ENVIO_SINAF` date DEFAULT NULL,
  `DT_RETORNO_SINAF` date DEFAULT NULL,
  `DT_ENVIO_SIAEF` date DEFAULT NULL,
  `DT_RETORNO_SIAEF` date DEFAULT NULL,
  `DT_ENVIO_SIDEC` date DEFAULT NULL,
  `DT_RETORNO_SIDEC` date DEFAULT NULL,
  `CO_USUARIO` char(8) DEFAULT NULL,
  `CO_TERMINAL` char(15) DEFAULT NULL,
  `CO_APLICACAO` char(8) DEFAULT NULL,
  `TS_MOVIMENTO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabela_movimento`
--

INSERT INTO `tabela_movimento` (`NU_MOVIMENTO`, `DT_MOVIMENTO`, `NU_ACAO`, `NU_OBJETO`, `NU_ALVO`, `NU_ORIGEM`, `NU_DESTINO`, `NU_PRODUTO`, `NU_FONTE_PROPOSTA`, `NU_UNDDE_PROPOSTA`, `NU_NTRL_PROPOSTA`, `NU_SQNCL_PROPOSTA`, `NU_SEGMENTO`, `CO_CARTEIRA`, `NU_FONTE_RECURSO`, `NU_CANAL`, `NU_OCORRENCIA`, `NU_PARCELA`, `VR_MOVIMENTO`, `IC_CANCELADO`, `IC_MAIS_RECENTE`, `IC_INCORPORADO`, `IC_EFETIVA_AGENDA`, `IC_ESTORNADO`, `NU_UNIDADE_ORIGEM`, `NU_NATURAL_ORIGEM`, `NU_UNIDADE_DESTINO`, `NU_NATURAL_DESTINO`, `NU_UNIDADE_RCBTO`, `NU_NATURAL_RCBTO`, `DT_ENVIO_SINAF`, `DT_RETORNO_SINAF`, `DT_ENVIO_SIAEF`, `DT_RETORNO_SIAEF`, `DT_ENVIO_SIDEC`, `DT_RETORNO_SIDEC`, `CO_USUARIO`, `CO_TERMINAL`, `CO_APLICACAO`, `TS_MOVIMENTO`) VALUES
(NULL, '2010-11-12', 10, 20, 30, 40, 50, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-01 16:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `tabela_produtos`
--

CREATE TABLE IF NOT EXISTS `tabela_produtos` (
  `NU_PRODUTO` smallint(6) NOT NULL AUTO_INCREMENT,
  `NO_PRODUTO` char(200) DEFAULT NULL,
  `DT_INICIO` int(30) DEFAULT NULL,
  `DT_FIM` int(30) DEFAULT NULL,
  `IC_CANCELADO` char(1) DEFAULT NULL,
  `CO_USUARIO` char(8) DEFAULT NULL,
  `CO_TERMINAL` char(15) DEFAULT NULL,
  `CO_APLICACAO` char(8) DEFAULT NULL,
  `TS_CNTRE_ATLZO` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`NU_PRODUTO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tabela_produtos`
--

INSERT INTO `tabela_produtos` (`NU_PRODUTO`, `NO_PRODUTO`, `DT_INICIO`, `DT_FIM`, `IC_CANCELADO`, `CO_USUARIO`, `CO_TERMINAL`, `CO_APLICACAO`, `TS_CNTRE_ATLZO`) VALUES
(1, 'Minha Casa Minha Vida', 1262325600, 1293775200, 'N', NULL, NULL, NULL, NULL),
(2, 'Alto Padr&#259;o', 1262311200, 1293760800, 'N', NULL, NULL, NULL, NULL),
(3, 'Padrão Médio', 1262325600, 1293775200, 'N', NULL, NULL, NULL, NULL),
(4, 'Funcionalismo Civil', 1262325600, 1293775200, 'N', NULL, NULL, NULL, NULL),
(5, 'Funcionalismo Militar', 1262325600, 1293775200, 'N', NULL, NULL, NULL, NULL),
(18, 'Teste', 1289354400, 1289613600, 'N', '7', '', '', '2010-11-02 13:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_participante`
--

CREATE TABLE IF NOT EXISTS `tipo_participante` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` char(200) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tipo_participante`
--

INSERT INTO `tipo_participante` (`codigo`, `nome`) VALUES
(1, 'Avalista'),
(2, 'Devedor Principal'),
(3, 'Esposa do Devedor Principal'),
(4, 'Esposa do Avalista'),
(5, 'Co-Participante');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(50) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `endereco` char(100) DEFAULT NULL,
  `bairro` char(30) DEFAULT NULL,
  `cidade` char(30) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `cargo` char(30) DEFAULT NULL,
  `id` char(10) DEFAULT NULL,
  `senha` char(15) DEFAULT NULL,
  `flags` text,
  `criador` int(11) NOT NULL,
  `c_time` int(20) NOT NULL,
  `ban` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`matricula`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`matricula`, `nome`, `cpf`, `endereco`, `bairro`, `cidade`, `estado`, `email`, `cargo`, `id`, `senha`, `flags`, `criador`, `c_time`, `ban`) VALUES
(3, 'vitor', '111.111.111-11', 'xxx', 'xx', 'xxx', 'df', 'xxx', 'xxx', 'vitor', 'vitor1', 'a:6:{i:0;s:15:"/manutencao.php";i:1;s:10:"/index.php";i:2;s:12:"/incluir.php";i:3;s:12:"/excluir.php";i:4;s:14:"/consultar.php";i:5;s:19:"/consulta_fatos.php";}', 1, 1279832794, 0),
(7, 'Renato Diniz W. Ceolin', '111.111.111-11', 'Rua Alberto Ribeiro de Miranda, 157', 'Ingá', 'Betim', 'mg', 'renatodinizwc@gmail.com', 'Porra Nenhuma', 'renato', '909031', 'a:40:{i:0;s:15:"/manutencao.php";i:1;s:10:"/index.php";i:2;s:12:"/incluir.php";i:3;s:12:"/excluir.php";i:4;s:14:"/consultar.php";i:5;s:19:"/consulta_fatos.php";i:6;s:20:"/consulta_evento.php";i:7;s:27:"/consulta_evento_filtro.php";i:8;s:13:"/cancelar.php";i:9;s:15:"/alt_evento.php";i:10;s:20:"/alt_evento_form.php";i:11;s:22:"/inc_elemento_form.php";i:12;s:17:"/ing_elemento.php";i:13;s:15:"/inc_evento.php";i:14;s:21:"/inc_evento_grava.php";i:15;s:14:"/evento_ok.php";i:16;s:18:"/evento_return.php";i:17;s:16:"/inc_momento.php";i:18;s:22:"/inc_momento_grava.php";i:19;s:16:"/inc_roteiro.php";i:20;s:22:"/inc_roteiro_grava.php";i:21;s:16:"/inc_usuario.php";i:22;s:22:"/inc_usuario_grava.php";i:23;s:19:"/c_sistema_form.php";i:24;s:14:"/c_sistema.php";i:25;s:19:"/e_sistema_form.php";i:26;s:14:"/e_sistema.php";i:27;s:19:"/e_sistema_done.php";i:28;s:22:"/exc_elemento_form.php";i:29;s:21:"/exc_elemento_ask.php";i:30;s:17:"/exc_elemento.php";i:31;s:20:"/exc_evento_form.php";i:32;s:19:"/exc_evento_ask.php";i:33;s:15:"/exc_evento.php";i:34;s:21:"/exc_momento_form.php";i:35;s:20:"/exc_momento_ask.php";i:36;s:16:"/exc_momento.php";i:37;s:21:"/exc_usuario_form.php";i:38;s:20:"/exc_usuario_ask.php";i:39;s:16:"/exc_usuario.php";}', 6, 1279928928, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
