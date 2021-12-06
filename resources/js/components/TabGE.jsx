import React from 'react';
import VistaGrupoEmpresa from './VistaGrupoEmpresa';
import { ContenedorTab } from '../elementos/TabGE';
import Socios from './DatosGrupoEmpresa/Socios';
import SociosAdmin from './DatosGrupoEmpresa/SociosAdmin';
import { ContenedorDatos } from '../elementos/registro';
import Invitaciones from './DatosGrupoEmpresa/Invitaciones';

const TabGE = () => {

    const usuario = sessionStorage.getItem('id');

    return (
      <ContenedorTab className='container'>
          <nav>
            <div className="nav nav-tabs" id="nav-tab" role="tablist">
              <a className="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Grupo Empresa</a>
              <a className="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Socios</a>
              <a className="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Documentos</a>
            </div>
          </nav>
          <div className="tab-content" id="nav-tabContent">
            <div className="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <VistaGrupoEmpresa></VistaGrupoEmpresa>
            </div>
            <div className="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              {(usuario == datos.duenio) ? (<><Invitaciones/><SociosAdmin/></>):(<Socios></Socios>)}
            </div>
            <div className="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, quia veniam autem exercitationem nostrum, blanditiis aliquam inventore dolorem tenetur ratione, saepe ad eveniet dolor et? Voluptates unde ratione dolor eligendi?
            </div>
          </div>
      </ContenedorTab>
    )
}

export default TabGE
