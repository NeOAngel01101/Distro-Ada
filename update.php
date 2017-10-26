<?php
    include_once 'config.php';
    include_once 'connect_db.php';
    include_once 'helpers.php';

    $id = $_REQUEST['id'];


    $errors = [];

    if( !empty($_POST) ){
        // Recibo los 9 datos del formulario
            $Nombre = $_POST['Nombre'];
            $Imagen = $_POST['Imagen'];
            $TipodeSistemaOperativo = $_POST['TipodeSistemaOperativo'];
            $Basado = $_POST['Basado'];
            $Origen = $_POST['Origen'];
            $Arquitectura = $_POST['Arquitectura'];
            $Escritorio = $_POST['Escritorio'];
            $Categoria = $_POST['Categoria'];
            $Estado = $_POST['Estado'];
            $Version = $_POST['Version'];
            $Web = $_POST['Web'];
            $Doc = $_POST['Doc'];
            $Foro = $_POST['Foro'];
            $Trakererror = $_POST['Trakererror'];
            $Descripcion = $_POST['Descripcion'];




        $id = $_POST['id'];

        if ( empty($errors) ) {

            $sql = "UPDATE distribuciones SET Nombre = :Nombre , Imagen = :Imagen,TipodeSistemaOperativo = :TipodeSistemaOperativo, Basado = :Basado, Origen = :Origen, Arquitectura = :Arquitectura, Escritorio = :Escritorio, Categoria = :Categoria, Estado = :Estado, Version = :Version, Web = :Web, Doc =:Doc, Foro = :Foro, Trakererror = :Trakererror, Descripcion =: Descripcion WHERE id = :id";

            $result = $pdo->prepare($sql);

            $result->execute([
                'Nombre'     => $Nombre,
                'Imagen'  => $Imagen,
                'TipodeSistemaOperativo'  => $TipodeSistemaOperativo,                                  
                'Basado'  => $Basado,
                'Origen'  => $Origen,
                'Arquitectura'  => $Arquitectura,
                'Escritorio'  => $Escritorio,
                'Categoria'  => $Categoria,
                'Estado'  => $Estado,
                'Version'  => $Version,
                'Web'  => $Web,
                'Doc'  => $Doc,
                'Foro'  => $Foro,                                
                'Trakererror'  => $Trakererror,
                'Descripcion'  => $Descripcion,                                       
                'id'        => $id
            ]);

            // Mando la aplicación a la página de inicio

            header('Location: index.php');
        }else{
            $distribuciones = dameDistribuciones($pdo, $id);
        }


    }else{
        $distribuciones = dameDistribuciones($pdo, $id);

//        dameDistribuciones($distribuciones);
//        die();
    }

//dameDistribuciones($errors);

function dameDistribuciones($pdo, $id) {
    $sql = "SELECT * FROM distribuciones WHERE id = :id";
    $result = $pdo->prepare($sql);
    $result->execute([
        'id' => $id
    ]);
    return $result->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DistroAda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/app.css">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">DistroAda</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Inicio</a></li>
            <li><a href="add.php">Añadir Distro</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?=$distribuciones['id']?>">
         <div class="form-group">
            <label for="Nombre">Nombre :</label>
            <input class="form-control" type="text" id="Nombre" name="Nombre" value="<?=$distribuciones['Nombre']?>">
        </div>

        <div class="form-group">
            <label for="Imagen">Imagen :</label>
            <input class="form-control" type="text" id="Imagen" name="Imagen" value="<?=$distribuciones['Imagen']?>">
        </div>

        <div class="form-group">
            <label for="TipodeSistemaOperativo">Tipo de Sistema Operativo :</label>
            <select class="form-control" name="TipodeSistemaOperativo" id="TipodeSistemaOperativo" value="<?=$distribuciones['TipodeSistemaOperativo']?>">
                <option value="Linux">Linux</option>
                <option value="BSD">BSD</option>
                <option value="Solaris">Solaris</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Basado">Basado :</label>
            <select class="form-control" name="Basado" id="Basado" multiple value="<?=$distribuciones['Basado']?>">
                <option selected value="All">All</option>
                <option value="Android">Android</option>
                <option value="Arch">Arch</option>
                <option value="CentOS">CentOS</option>
                <option value="CRUX">CRUX</option>
                <option value="Debian">Debian</option>
                <option value="Debian (Stable)">Debian (Stable)</option>
                <option value="Debian (Testing)">Debian (Testing)</option>
                <option value="Debian (Unstable)">Debian (Unstable)</option>
                <option value="Fedora">Fedora</option>
                <option value="FreeBSD">FreeBSD</option>
                <option value="Gentoo">Gentoo</option>
                <option value="Independent">Independent</option>
                <option value="KDE neon">KDE neon</option>
                <option value="KNOPPIX">KNOPPIX</option>
                <option value="LFS">LFS</option>
                <option value="Mageia">Mageia</option>
                <option value="Mandriva">Mandriva</option>
                <option value="Manjaro">Manjaro</option>
                <option value="OpenBSD">OpenBSD</option>
                <option value="openSUSE">openSUSE</option>
                <option value="PCLinuxOS">PCLinuxOS</option>
                <option value="Puppy">Puppy</option>
                <option value="Red Hat">Red Hat</option>
                <option value="rPath">rPath</option>
                <option value="sidux">sidux</option>
                <option value="Slackware">Slackware</option>
                <option value="SliTaz">SliTaz</option>
                <option value="Solaris">Solaris</option>
                <option value="Ubuntu">Ubuntu</option>
                <option value="Ubuntu (LTS)">Ubuntu (LTS)</option>
                <option value="Tiny Core">Tiny Core</option>
                <option value="Zenwalk">Zenwalk</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Origen">Origen</label>
            <select class="form-control" name="Origen" id="Origen" value="<?=$distribuciones['Origen']?>">
                <option selected value="All">All</option>
                <option value="Algeria">Algeria</option>
                <option value="Argentina">Argentina</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Belgium">Belgium</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Brazil">Brazil</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Canada">Canada</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Cuba">Cuba</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="Greece">Greece</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Latvia">Latvia</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malta">Malta</option>
                <option value="Mexico">Mexico</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Réunion">Réunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Serbia">Serbia</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Thailand">Thailand</option>
                <option value="Turkey">Turkey</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="USA">USA</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Arquitectura">Arquitectura :</label>
            <select class="form-control" name="Arquitectura" id="Arquitectura" value="<?=$distribuciones['Arquitectura']?>">
                <option selected value="All">All</option>
                <option value="acorn26">acorn26</option>
                <option value="acorn32">acorn32</option>
                <option value="alpha">alpha</option>
                <option value="amiga">amiga</option>
                <option value="arc">arc</option>
                <option value="arm">arm</option>
                <option value="armv5tel">armv5tel</option>
                <option value="arm64">arm64</option>
                <option value="armel">armel</option>
                <option value="armhf">armhf</option>
                <option value="atari">atari</option>
                <option value="cats">cats</option>
                <option value="cobalt">cobalt</option>
                <option value="dreamcast">dreamcast</option>
                <option value="emips">emips</option>
                <option value="evbarm">evbarm</option>
                <option value="evbmips">evbmips</option>
                <option value="evbppc">evbppc</option>
                <option value="evbsh3">evbsh3</option>
                <option value="ews4800mips">ews4800mips</option>
                <option value="hp300">hp300</option>
                <option value="hp700">hp700</option>
                <option value="hpcarm">hpcarm</option>
                <option value="hpcmips">hpcmips</option>
                <option value="hpcsh">hpcsh</option>
                <option value="hppa">hppa</option>
                <option value="i386">i386</option>
                <option value="i486">i486</option>
                <option value="i586">i586</option>
                <option value="i686">i686</option>
                <option value="ia64">ia64</option>
                <option value="ibmnws">ibmnws</option>
                <option value="ix86">ix86</option>
                <option value="luna68k">luna68k</option>
                <option value="m68010">m68010</option>
                <option value="m68k">m68k</option>
                <option value="mips">mips</option>
                <option value="mipsco">mipsco</option>
                <option value="mipsel">mipsel</option>
                <option value="mvme68k">mvme68k</option>
                <option value="mvmeppc">mvmeppc</option>
                <option value="news68k">news68k</option>
                <option value="newsmips">newsmips</option>
                <option value="ns32k">ns32k</option>
                <option value="ofppc">ofppc</option>
                <option value="pmax">pmax</option>
                <option value="powerpc">powerpc</option>
                <option value="ppc64">ppc64</option>
                <option value="ppc64el">ppc64el</option>
                <option value="prep">prep</option>
                <option value="ps2">ps2</option>
                <option value="ps3">ps3</option>
                <option value="s390">s390</option>
                <option value="s390x">s390x</option>
                <option value="sandpoint">sandpoint</option>
                <option value="sgimips">sgimips</option>
                <option value="sh3eb">sh3eb</option>
                <option value="sh3el">sh3el</option>
                <option value="sh5">sh5</option>
                <option value="shark">shark</option>
                <option value="sparc32">sparc32</option>
                <option value="sparc64">sparc64</option>
                <option value="sun2">sun2</option>
                <option value="sun3">sun3</option>
                <option value="vax">vax</option>
                <option value="x68k">x68k</option>
                <option value="x86_64">x86_64</option>
                <option value="xbox">xbox</option>
                <option value="zaurus">zaurus</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Escritorio">Escritorio :</label>
            <select class="form-control" name="Escritorio" id="Escritorio" value="<?=$distribuciones['Escritorio']?>">
            <option selected value="All">All</option>
            <option value="No desktop">No desktop</option>
            <option value="AfterStep">AfterStep</option>
            <option value="Android">Android</option>
            <option value="Awesome">Awesome</option>
            <option value="Blackbox">Blackbox</option>
            <option value="bspwm">bspwm</option>
            <option value="Budgie">Budgie</option>
            <option value="Cinnamon">Cinnamon</option>
            <option value="Consort">Consort</option>
            <option value="Deepin">Deepin</option>
            <option value="dwm">dwm</option>
            <option value="Enlightenment">Enlightenment</option>
            <option value="Equinox">Equinox</option>
            <option value="Firefox">Firefox</option>
            <option value="Fluxbox">Fluxbox</option>
            <option value="flwm">flwm</option>
            <option value="FVWM">FVWM</option>
            <option value="GNOME">GNOME</option>
            <option value="Hackedbox">Hackedbox</option>
            <option value="i3">i3</option>
            <option value="IceWM">IceWM</option>
            <option value="ion">ion</option>
            <option value="JWM">JWM</option>
            <option value="KDE">KDE</option>
            <option value="KDE Plasma">KDE Plasma</option>
            <option value="Kodi (XBMC)">Kodi (XBMC)</option>
            <option value="Lesstif">Lesstif</option>
            <option value="Lumina">Lumina</option>
            <option value="LXDE">LXDE</option>
            <option value="LXQt">LXQt</option>
            <option value="MATE">MATE</option>
            <option value="Maynard">Maynard</option>
            <option value="Metacity">Metacity</option>
            <option value="Mezzo">Mezzo</option>
            <option value="Moblin">Moblin</option>
            <option value="Openbox">Openbox</option>
            <option value="Pantheon">Pantheon</option>
            <option value="Pearl">Pearl</option>
            <option value="pekwm">pekwm</option>
            <option value="Ratpoison">Ratpoison</option>
            <option value="Razor-qt">Razor-qt</option>
            <option value="SLWM">SLWM</option>
            <option value="Sugar">Sugar</option>
            <option value="Trinity">Trinity</option>
            <option value="TWM">TWM</option>
            <option value="Unity">Unity</option>
            <option value="WebUI">WebUI</option>
            <option value="WMaker">WMaker</option>
            <option value="WMFS">WMFS</option>
            <option value="WMI">WMI</option>
            <option value="Xfce">Xfce</option>
        </select>
        </div>

        <div class="form-group">
            <label for="Categoria">Categoria :</label>
            <select class="form-control" name="Categoria" id="Categoria"value="<?=$distribuciones['Categoria']?>">
            <option selected value="All">All</option>
            <option value="Beginners">Beginners</option>
            <option value="Clusters">Clusters</option>
            <option value="Data Rescue">Data Rescue</option>
            <option value="Desktop">Desktop</option>
            <option value="Disk Management">Disk Management</option>
            <option value="Docker">Docker</option>
            <option value="Education">Education</option>
            <option value="Firewall">Firewall</option>
            <option value="Forensics">Forensics</option>
            <option value="Free Software">Free Software</option>
            <option value="Gaming">Gaming</option>
            <option value="High Performance Computing">High Performance Computing</option>
            <option value="Live Medium">Live Medium</option>
            <option value="Multimedia">Multimedia</option>
            <option value="MythTV">MythTV</option>
            <option value="NAS">NAS</option>
            <option value="Netbooks">Netbooks</option>
            <option value="Old Computers">Old Computers</option>
            <option value="Privacy">Privacy</option>
            <option value="Raspberry Pi">Raspberry Pi</option>
            <option value="Scientific">Scientific</option>
            <option value="Server">Server</option>
            <option value="Security">Security</option>
            <option value="Source-based">Source-based</option>
            <option value="Specialist">Specialist</option>
            <option value="Telephony">Telephony</option>
            <option value="Thin Client">Thin Client</option>
        </select>
        </div>

        <div class="form-group">
            <label for="Estado">Estado :</label>
            <select class="form-control" name="Estado" id="Estado" value="<?=$distribuciones['Estado']?>">
                <option>Activo</option>
                <option>Ibernando</option>
                <option>Abandonado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Version">Version</label>
            <input type="text" class="form-control" id="Version" name="Version" value="<?=$distribuciones['Version']?>">
        </div>

        <div class="form-group">
            <label for="Web">Web</label>
            <input type="text" class="form-control" id="Web" name="Web" value="<?=$distribuciones['Web']?>">
        </div>

        <div class="form-group">
            <label for="Doc">Doc</label>
            <input type="text" class="form-control" id="Doc" name="Doc" value="<?=$distribuciones['Web']?>">
        </div>

        <div class="form-group">
            <label for="Foro">Foro</label>
            <input type="text" class="form-control" id="Foro" name="Foro" value="<?=$distribuciones['Foro']?>">
        </div>

        <div class="form-group">
            <label for="Trakererror">Trakererror</label>
            <input type="text" class="form-control" id="Trakererror" name="Trakererror" value="<?=$distribuciones['Trakererror']?>">
        </div>

        <div class="form-group">
            <label for="Descripcion">Descripcion</label>
            <textarea class="form-control" name="Descripcion" id="Descripcion" rows="5" value="<?=$distribuciones['Descripcion']?>"> </textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Guardar" >
        </div>
    </form>
</div>
</body>