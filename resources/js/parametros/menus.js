import {faUser, 
faUsers,
faAddressCard,
faBriefcase,
faPowerOff,
faClipboard} from '@fortawesome/free-solid-svg-icons'
import { cerrarSession } from './session';

const opcionesUsuario = [{
    link :'Socio-'+sessionStorage.getItem('id'), 
    name:'perfil', 
    contenido:'Mi Perfil', 
    img:faUser,
    onClick: null
},{ 
    link : (sessionStorage.getItem('ge')) ? 'GE-'+sessionStorage.getItem('ge'):'#', 
    name:'grupoEmpresa', 
    contenido:'Mi Grupo Empresa', 
    img:faUsers,
    onClick: null
},{
    link : "RegistroGE", 
    name:'crearGrupoEmpresal', 
    contenido:'Crear Grupo Empresa', 
    img:faAddressCard,
    onClick: null
},{
    link : "FundaEmpresa", 
    name:'', 
    contenido:'Funda-Empresa', 
    img:faClipboard,
    onClick: null
},{
    link : "#", 
    name:'espacioTrabajo', 
    contenido:'Mi Espacio de trabajo', 
    img:faBriefcase,
    onClick: null
},{
    link : "#", 
    name:'cerrarSession', 
    contenido:'Cerrar Session', 
    img:faPowerOff,
    onClick: cerrarSession
},];

const registrarse = {
    nombre:'Registrarse',
    link:'RegistroDeUsuario'
}

const iniciarSession = {
    nombre:'Iniciar Session',
    link:'Login'
}

const datosNavegador = [
    {
        nombre:'Grupo Empresas',
        link : "/GrupoEmpresas"
    },{
        nombre:'FundaEmpresa',
        link : "#"
    },{
        nombre:'Informacion',
        link : "#"
    }
];

export {opcionesUsuario, 
        registrarse, 
        iniciarSession, 
        datosNavegador};
