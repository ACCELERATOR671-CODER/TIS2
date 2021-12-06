import { useState, useEffect, useLayoutEffect } from 'react'
import { Card } from '../elementos/card'
import { Tabla, THead, RowPrimary, RowSecundary, GrupoTabla } from '../elementos/GE'
import { Titulo } from '../elementos/registro'

const GrupoEmpresas = () => {

    const [ges, setGe] = useState([]);
    useEffect(() => {
        const dat = new FormData();
        dat.append('id', sessionStorage.getItem('id'));
        fetch('api/obtenerGrupoEmpresas',{
            method:'POST',
            body:dat
        }).then((response) => response.json()).then((json) => {
            setGe(json);
        });
    }, [])

    return (
        <main>
            <Card className=' text-center justify-content-center'>
                {(ges.length>0) ? (<><GrupoTabla>
                    <Titulo>Grupo Empresas En Tu Grupo de Asesoría</Titulo>
                    <Tabla  className=' m-3'>
                        <THead>
                            <tr>
                                <th>Numero</th>
                                <th>Grupo Empresas</th>
                                <th>Creador</th>
                                <th>Nro Integrantes</th>
                            </tr>
                        </THead>
                        <tbody>
                        {ges.map((data, index) => {
                            
                            return (index%2==0) ? 
                                    (<><RowSecundary>
                                        <td>{index+1}</td><td><a href={`/GE-${data.nombre}`} >{data.nombre}</a></td><td>{data.creador}</td><td>{data.integrantes}</td>
                                    </RowSecundary></>)
                                    :
                                    (<><RowPrimary>
                                        <td>{index+1}</td><td><a href={`/GE-${data.nombre}`} >{data.nombre}</a></td><td>{data.creador}</td><td>{data.integrantes}</td>
                                    </RowPrimary></>)})}
                        </tbody>
                    </Tabla>
                </GrupoTabla></>) : (<Titulo>No hay Grupo-Empresas Registradas En Tu Grupo</Titulo>)}
            </Card>
        </main>
    )
}

export default GrupoEmpresas
