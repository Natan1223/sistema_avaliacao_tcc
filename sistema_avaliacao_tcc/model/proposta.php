
<?php 
/*
 * Class proposta
 */
class proposta
{ 
  /* Atributes */ 
  var $contextualizacao;
  var $bibliografia;
  var $metodologia;
  var $objetivo_especifico;
  var $objetivo_geral;
  var $justificativa;
  var $problematica;
  var $cod_proposta;
  var $integrantes;
  var $titulo_proposta;
  var $cod_materia;
  var $cod_grupo;
  var $cod_pesquisa;
  var $cod_udc_status_proposta;
  /* Methods (set/get) */
  function setcontextualizacao( $contextualizacao ) 
  { 
    $this->contextualizacao = $contextualizacao;
  }
  function getcontextualizacao()
  { 
    return $this->contextualizacao;
  }
  function setbibliografia( $bibliografia ) 
  { 
    $this->bibliografia = $bibliografia;
  }
  function getbibliografia()
  { 
    return $this->bibliografia;
  }
  function setmetodologia( $metodologia ) 
  { 
    $this->metodologia = $metodologia;
  }
  function getmetodologia()
  { 
    return $this->metodologia;
  }
  function setobjetivo_especifico( $objetivo_especifico ) 
  { 
    $this->objetivo_especifico = $objetivo_especifico;
  }
  function getobjetivo_especifico()
  { 
    return $this->objetivo_especifico;
  }
  function setobjetivo_geral( $objetivo_geral ) 
  { 
    $this->objetivo_geral = $objetivo_geral;
  }
  function getobjetivo_geral()
  { 
    return $this->objetivo_geral;
  }
  function setjustificativa( $justificativa ) 
  { 
    $this->justificativa = $justificativa;
  }
  function getjustificativa()
  { 
    return $this->justificativa;
  }
  function setproblematica( $problematica ) 
  { 
    $this->problematica = $problematica;
  }
  function getproblematica()
  { 
    return $this->problematica;
  }
  function setcod_proposta( $cod_proposta ) 
  { 
    $this->cod_proposta = $cod_proposta;
  }
  function getcod_proposta()
  { 
    return $this->cod_proposta;
  }
  function setintegrantes( $integrantes ) 
  { 
    $this->integrantes = $integrantes;
  }
  function getintegrantes()
  { 
    return $this->integrantes;
  }
  function settitulo_proposta( $titulo_proposta ) 
  { 
    $this->titulo_proposta = $titulo_proposta;
  }
  function gettitulo_proposta()
  { 
    return $this->titulo_proposta;
  }
  function setcod_materia( $cod_materia ) 
  { 
    $this->cod_materia = $cod_materia;
  }
  function getcod_materia()
  { 
    return $this->cod_materia;
  }
  function setcod_grupo( $cod_grupo ) 
  { 
    $this->cod_grupo = $cod_grupo;
  }
  function getcod_grupo()
  { 
    return $this->cod_grupo;
  }
  function setcod_pesquisa( $cod_pesquisa ) 
  { 
    $this->cod_pesquisa = $cod_pesquisa;
  }
  function getcod_pesquisa()
  { 
    return $this->cod_pesquisa;
  }
  function setcod_udc_status_proposta( $cod_udc_status_proposta ) 
  { 
    $this->cod_udc_status_proposta = $cod_udc_status_proposta;
  }
  function getcod_udc_status_proposta()
  { 
    return $this->cod_udc_status_proposta;
  }
}
?>
