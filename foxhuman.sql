--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4 (Ubuntu 12.4-1.pgdg20.04+1)
-- Dumped by pg_dump version 12.4 (Ubuntu 12.4-1.pgdg20.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: product_categories; Type: TABLE; Schema: public; Owner: foxhuman
--

CREATE TABLE public.product_categories (
    id integer NOT NULL,
    category_name character varying(999) NOT NULL
);


ALTER TABLE public.product_categories OWNER TO foxhuman;

--
-- Name: product_categories_id_seq; Type: SEQUENCE; Schema: public; Owner: foxhuman
--

CREATE SEQUENCE public.product_categories_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_categories_id_seq OWNER TO foxhuman;

--
-- Name: product_categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: foxhuman
--

ALTER SEQUENCE public.product_categories_id_seq OWNED BY public.product_categories.id;


--
-- Name: product_category_taxes; Type: TABLE; Schema: public; Owner: foxhuman
--

CREATE TABLE public.product_category_taxes (
    id integer NOT NULL,
    product_category_id numeric,
    tax_id numeric
);


ALTER TABLE public.product_category_taxes OWNER TO foxhuman;

--
-- Name: product_category_taxes_id_seq; Type: SEQUENCE; Schema: public; Owner: foxhuman
--

CREATE SEQUENCE public.product_category_taxes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_category_taxes_id_seq OWNER TO foxhuman;

--
-- Name: product_category_taxes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: foxhuman
--

ALTER SEQUENCE public.product_category_taxes_id_seq OWNED BY public.product_category_taxes.id;


--
-- Name: products; Type: TABLE; Schema: public; Owner: foxhuman
--

CREATE TABLE public.products (
    id integer NOT NULL,
    product_name character varying(9999) NOT NULL,
    unit_cost numeric,
    amount numeric,
    category_id numeric
);


ALTER TABLE public.products OWNER TO foxhuman;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: foxhuman
--

CREATE SEQUENCE public.products_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO foxhuman;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: foxhuman
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- Name: shopping_car; Type: TABLE; Schema: public; Owner: foxhuman
--

CREATE TABLE public.shopping_car (
    id integer NOT NULL,
    created_at date
);


ALTER TABLE public.shopping_car OWNER TO foxhuman;

--
-- Name: shopping_car_id_seq; Type: SEQUENCE; Schema: public; Owner: foxhuman
--

CREATE SEQUENCE public.shopping_car_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shopping_car_id_seq OWNER TO foxhuman;

--
-- Name: shopping_car_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: foxhuman
--

ALTER SEQUENCE public.shopping_car_id_seq OWNED BY public.shopping_car.id;


--
-- Name: shopping_items; Type: TABLE; Schema: public; Owner: foxhuman
--

CREATE TABLE public.shopping_items (
    id integer NOT NULL,
    product_id numeric,
    amount numeric,
    shopping_car_id numeric
);


ALTER TABLE public.shopping_items OWNER TO foxhuman;

--
-- Name: shopping_items_id_seq; Type: SEQUENCE; Schema: public; Owner: foxhuman
--

CREATE SEQUENCE public.shopping_items_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shopping_items_id_seq OWNER TO foxhuman;

--
-- Name: shopping_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: foxhuman
--

ALTER SEQUENCE public.shopping_items_id_seq OWNED BY public.shopping_items.id;


--
-- Name: taxes; Type: TABLE; Schema: public; Owner: foxhuman
--

CREATE TABLE public.taxes (
    id integer NOT NULL,
    tax_name character varying(99),
    tax_value numeric
);


ALTER TABLE public.taxes OWNER TO foxhuman;

--
-- Name: taxes_id_seq; Type: SEQUENCE; Schema: public; Owner: foxhuman
--

CREATE SEQUENCE public.taxes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.taxes_id_seq OWNER TO foxhuman;

--
-- Name: taxes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: foxhuman
--

ALTER SEQUENCE public.taxes_id_seq OWNED BY public.taxes.id;


--
-- Name: product_categories id; Type: DEFAULT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.product_categories ALTER COLUMN id SET DEFAULT nextval('public.product_categories_id_seq'::regclass);


--
-- Name: product_category_taxes id; Type: DEFAULT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.product_category_taxes ALTER COLUMN id SET DEFAULT nextval('public.product_category_taxes_id_seq'::regclass);


--
-- Name: products id; Type: DEFAULT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- Name: shopping_car id; Type: DEFAULT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.shopping_car ALTER COLUMN id SET DEFAULT nextval('public.shopping_car_id_seq'::regclass);


--
-- Name: shopping_items id; Type: DEFAULT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.shopping_items ALTER COLUMN id SET DEFAULT nextval('public.shopping_items_id_seq'::regclass);


--
-- Name: taxes id; Type: DEFAULT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.taxes ALTER COLUMN id SET DEFAULT nextval('public.taxes_id_seq'::regclass);


--
-- Data for Name: product_categories; Type: TABLE DATA; Schema: public; Owner: foxhuman
--

COPY public.product_categories (id, category_name) FROM stdin;
1	Sabonete
2	Shampoo
\.


--
-- Data for Name: product_category_taxes; Type: TABLE DATA; Schema: public; Owner: foxhuman
--

COPY public.product_category_taxes (id, product_category_id, tax_id) FROM stdin;
1	1	1
2	2	2
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: foxhuman
--

COPY public.products (id, product_name, unit_cost, amount, category_id) FROM stdin;
5	Tressemé	5.23	48	2
3	Dove	3	48	1
4	Phebo	4	48	1
2	Palmolive	3	10	1
\.


--
-- Data for Name: shopping_car; Type: TABLE DATA; Schema: public; Owner: foxhuman
--

COPY public.shopping_car (id, created_at) FROM stdin;
37	2021-02-17
38	2021-02-17
39	2021-02-17
40	2021-02-17
41	2021-02-17
42	2021-02-17
43	2021-02-17
44	2021-02-17
45	2021-02-17
46	2021-02-17
47	2021-02-17
48	2021-02-17
49	2021-02-17
50	2021-02-17
51	2021-02-17
52	2021-02-17
53	2021-02-17
54	2021-02-17
55	2021-02-17
56	2021-02-17
57	2021-02-17
58	2021-02-17
59	2021-02-17
60	2021-02-17
61	2021-02-17
62	2021-02-17
63	2021-02-17
64	2021-02-17
65	2021-02-17
66	2021-02-17
67	2021-02-17
68	2021-02-17
69	2021-02-17
70	2021-02-17
71	2021-02-17
\.


--
-- Data for Name: shopping_items; Type: TABLE DATA; Schema: public; Owner: foxhuman
--

COPY public.shopping_items (id, product_id, amount, shopping_car_id) FROM stdin;
\.


--
-- Data for Name: taxes; Type: TABLE DATA; Schema: public; Owner: foxhuman
--

COPY public.taxes (id, tax_name, tax_value) FROM stdin;
1	IRSS	10
2	COFINS	18
\.


--
-- Name: product_categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: foxhuman
--

SELECT pg_catalog.setval('public.product_categories_id_seq', 10, true);


--
-- Name: product_category_taxes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: foxhuman
--

SELECT pg_catalog.setval('public.product_category_taxes_id_seq', 9, true);


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: foxhuman
--

SELECT pg_catalog.setval('public.products_id_seq', 12, true);


--
-- Name: shopping_car_id_seq; Type: SEQUENCE SET; Schema: public; Owner: foxhuman
--

SELECT pg_catalog.setval('public.shopping_car_id_seq', 71, true);


--
-- Name: shopping_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: foxhuman
--

SELECT pg_catalog.setval('public.shopping_items_id_seq', 1, false);


--
-- Name: taxes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: foxhuman
--

SELECT pg_catalog.setval('public.taxes_id_seq', 4, true);


--
-- Name: product_categories product_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.product_categories
    ADD CONSTRAINT product_categories_pkey PRIMARY KEY (id);


--
-- Name: product_category_taxes product_category_taxes_pkey; Type: CONSTRAINT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.product_category_taxes
    ADD CONSTRAINT product_category_taxes_pkey PRIMARY KEY (id);


--
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- Name: shopping_car shopping_car_pkey; Type: CONSTRAINT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.shopping_car
    ADD CONSTRAINT shopping_car_pkey PRIMARY KEY (id);


--
-- Name: shopping_items shopping_items_pkey; Type: CONSTRAINT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.shopping_items
    ADD CONSTRAINT shopping_items_pkey PRIMARY KEY (id);


--
-- Name: taxes taxes_pkey; Type: CONSTRAINT; Schema: public; Owner: foxhuman
--

ALTER TABLE ONLY public.taxes
    ADD CONSTRAINT taxes_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

