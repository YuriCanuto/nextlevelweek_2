import React from 'react';

import whatsappIcon from '../../assets/images/icons/whatsapp.svg';

import './styles.css';

function TeacherItem() {
    return (
        <article className="teacher-item">
            <header>
                <img src="https://scontent.fjpa9-1.fna.fbcdn.net/v/t1.0-1/p160x160/15181613_10209382145284875_8654790333005860055_n.jpg?_nc_cat=103&_nc_sid=dbb9e7&_nc_ohc=DjQ4S4BF7i4AX8KDw61&_nc_ht=scontent.fjpa9-1.fna&tp=6&oh=9dd41026e7747e536022e81786e1b077&oe=5F6D79EC" alt="Yuri"/>
                <div>
                    <strong>Yuri Canuto</strong>
                    <span>Química</span>
                </div>
            </header>                  

            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                <br /><br />
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>

            <footer>
                <p>
                    Preço/hora
                    <strong>R$ 30,00</strong>
                </p>
                <button type="button">
                    <img src={whatsappIcon} alt="Whatsapp"/>
                    Entrar em contato
                </button>
            </footer>

        </article>
    );
}

export default TeacherItem;