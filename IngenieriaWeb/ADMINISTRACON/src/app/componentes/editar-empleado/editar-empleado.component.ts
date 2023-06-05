import { Component, OnInit } from '@angular/core';


import { FormGroup, FormBuilder } from '@angular/forms';
import { CrudService } from 'src/app/servicio/crud.service';

import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-editar-empleado',
  templateUrl: './editar-empleado.component.html',
  styleUrls: ['./editar-empleado.component.css']
})
export class EditarEmpleadoComponent implements OnInit {
  
  formularioEmpleados:FormGroup;
  
  elID:any;
  constructor(
    
    private activeRoute:ActivatedRoute,
    private crudService:CrudService,
    public formulario:FormBuilder,
    private ruteador:Router

  ) { 
    this.elID=this.activeRoute.snapshot.paramMap.get('id');
    console.log(this.elID);

    this.crudService.ObtenerEmpleado(this.elID).subscribe(
      respuesta=>{
        console.log(respuesta);

        this.formularioEmpleados.setValue({
          nombre:respuesta[0]['nombre'],
          correo:respuesta[0]['correo']
        });
      }
    );
    this.formularioEmpleados=this.formulario.group(
      {
        nombre:[''],
        correo: ['']
      }
    );

   }

  ngOnInit(): void {
  }
  enviarDatos():any{
    console.log(this.elID);
    console.log(this.formularioEmpleados.value);
    this.crudService.EditarEmpleado(this.elID,this.formularioEmpleados.value).subscribe(()=>{
      this.ruteador.navigateByUrl('/listar-empleado');

    });
  }
}
