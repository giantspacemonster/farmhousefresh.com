# farmhousefresh.com
visit here for the static home page(just to get a feel of what it looks like):
https://giantspacemonster.github.io/farmhousefresh.com/
<h1>Welcome to the college project on a e-commercial site built on html,js,css,php,psql and runs on an apache2 server.</h1>
<h4>Setting up a local copy of the website</h4>
<h5>Dependencies:</h5>
<ul>
<li>php 7.2</li>
<li>psql 10.14</li>
<li> Server Version: Apache/2.4.29</li>
</ul>
Ubuntu Installation Guide:<hr/>
We use the LAPP(Linux, Apache, PostgreSQL, PHP) stack to develope the website.
We start by installing the dependent sofwares
<ol>
<li>
<h6>Install Apache Server</h6>
<code>sudo apt update</code><br/>
<code>sudo apt install apache2</code><br/>
</li>
<li>
By default, Apache comes with a basic site enabled. We can modify its content in <code>/var/www/html</code><br/>
Start by creating a directory in <code>/var/www/college-project/</code>.<br/>
Inside of the directory created, clone this project:<br/>
<code>sudo git clone https://github.com/giantspacemonster/farmhousefresh.com.git</code><br/>
Or<br/>
<code>gh repo clone giantspacemonster/farmhousefresh.com</code>
  
  Create a Virtual host in apache2, enable the college-project site, and (optional) disable default apache site.
  Use the following tutorial to do so:
  https://ubuntu.com/tutorials/install-and-configure-apache#3-creating-your-own-website
</li>
<li><h6>Install PostgreSQL</h6>
  <code>sudo apt install postgresql postgresql-contrib</code><br/>
  <ol>
    <li><h7>Start PostgreSQL as root user #postgres.</h7>
      <code>sudo psql -U postgres</code>
    </li>
    <li><h7>Create new user</h7>
      <code>CREATE USER username WITH LOGIN PASSWORD'secretpassword';</code>
      Also set the user as superuser:<br/>
      <code>ALTER USER username WITH SUPERUSER;</code>
    </li>
    <li><h7>Create new Database</h7>
      Also set the owner to the created username:<br/>
      <code>CREATE DATABASE databasename WITH OWNER=username;</code><br/>
      Note that the username used in the project is farmhousefreshdb and the database used is farmhousefreshdb and the password used is 'secretpassword'
    </li>
    <li><h7>Create the tables required</h7><br/>
      Table reg:<br/>
      <code>CREATE TABLE public.reg</code><br/>
            <code>(</code><br/>
              <code>first_name character varying(40),</code><br/>
              <code>last_name character varying(40),</code><br/>
  <code>gen character varying(10),</code><br/>
  <code>dob timestamp without time zone,</code><br/>
  <code>addr character varying(150),</code><br/>
  <code>email character varying(40),</code><br/>
  <code>password character varying(30),</code><br/>
  <code>mno bigint,</code><br/>
  <code>CONSTRAINT reg_email_key UNIQUE (email),</code><br/>
  <code>CONSTRAINT reg_mno_key UNIQUE (mno),</code><br/>
  <code>CONSTRAINT reg_password_key UNIQUE (password)</code><br/>
      <code>)</code><br/>
<code>WITH (
  OIDS=FALSE
);
ALTER TABLE public.reg
  OWNER TO farmhousefreshdb;
      </code>
      <br/>
      Table login:<br/>
      <code>
        CREATE TABLE public.login
        (
          email character varying(40),
          password character varying(30),
          CONSTRAINT login_email_fkey FOREIGN KEY (email)
          REFERENCES public.reg (email) MATCH SIMPLE
          ON UPDATE NO ACTION ON DELETE SET NULL,
          CONSTRAINT login_password_fkey FOREIGN KEY (password)
          REFERENCES public.reg (password) MATCH SIMPLE
          ON UPDATE NO ACTION ON DELETE SET NULL
        )
        WITH (
        OIDS=FALSE
        );
        ALTER TABLE public.login
        OWNER TO farmhousefreshdb;
      </code>
      <br/>
      Table Cart:
      <code>
        CREATE TABLE public.cart
        (
          sr_no integer NOT NULL DEFAULT nextval('cart_sr_no_seq'::regclass),
          productname character varying(40),
          quantity integer,
          price integer,
          CONSTRAINT cart_pkey PRIMARY KEY (sr_no)
        )
        WITH (
          OIDS=FALSE
        );
        ALTER TABLE public.cart
          OWNER TO farmhousefreshdb;
      </code>
      <br/>
      Table feedback:
      <br/>
      <code>
        CREATE TABLE public.feedback
        (
          mno bigint,
          message character varying(250),
          email character varying(40),
          CONSTRAINT feedback_email_fkey FOREIGN KEY (email)
          REFERENCES public.reg (email) MATCH SIMPLE
          ON UPDATE NO ACTION ON DELETE NO ACTION,
          CONSTRAINT feedback_mno_fkey FOREIGN KEY (mno)
          REFERENCES public.reg (mno) MATCH SIMPLE
          ON UPDATE NO ACTION ON DELETE NO ACTION
        )
        WITH (
          OIDS=FALSE
        );
        ALTER TABLE public.feedback
          OWNER TO farmhousefreshdb;
      </code>
    </li>
  </ol>
</li>
</ol>
