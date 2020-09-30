import React from 'react';
import Input from '../../components/Input';

import PageHeader from '../../components/PageHeader';

import './styles.css';

function TeacherForm() {
    return (
        <div id="page-teacher-form" className="container">
            <PageHeader 
                title="Que incrível que você quer dar aulas" 
                description="O primeiro passo é preencher esse formulário de inscrição"
            />

            <main>
                <fieldset>
                    <legend>Seus dados</legend>
                    <Input name="name" label="Nome completo"/>
                    <Input name="avatar" label="Avatar"/>
                    <Input name="whatsapp" label="Whatsapp"/>
                </fieldset>

                <fieldset>
                    <legend>Sobre a aula</legend>
                    <Input name="subject" label="Matéria"/>
                    <Input name="cost" label="Custo da sua hora por aula (em R$)"/>

                </fieldset>
            </main>
        </div>
    );
}

export default TeacherForm