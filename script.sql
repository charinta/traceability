USE [master]
GO
/****** Object:  Database [traceability]    Script Date: 18/07/2023 09:59:20 ******/
CREATE DATABASE [traceability]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'traceability', FILENAME = N'D:\Programs\MSSQL15.SQLEXPRESS\MSSQL\DATA\traceability.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'traceability_log', FILENAME = N'D:\Programs\MSSQL15.SQLEXPRESS\MSSQL\DATA\traceability_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [traceability] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [traceability].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [traceability] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [traceability] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [traceability] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [traceability] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [traceability] SET ARITHABORT OFF 
GO
ALTER DATABASE [traceability] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [traceability] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [traceability] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [traceability] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [traceability] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [traceability] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [traceability] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [traceability] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [traceability] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [traceability] SET  DISABLE_BROKER 
GO
ALTER DATABASE [traceability] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [traceability] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [traceability] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [traceability] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [traceability] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [traceability] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [traceability] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [traceability] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [traceability] SET  MULTI_USER 
GO
ALTER DATABASE [traceability] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [traceability] SET DB_CHAINING OFF 
GO
ALTER DATABASE [traceability] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [traceability] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [traceability] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [traceability] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [traceability] SET QUERY_STORE = OFF
GO
USE [traceability]
GO
/****** Object:  Table [dbo].[failed_jobs]    Script Date: 18/07/2023 09:59:20 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[failed_jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[uuid] [nvarchar](255) NOT NULL,
	[connection] [nvarchar](max) NOT NULL,
	[queue] [nvarchar](max) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[exception] [nvarchar](max) NOT NULL,
	[failed_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[password_reset_tokens]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[password_reset_tokens](
	[email] [nvarchar](255) NOT NULL,
	[token] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
 CONSTRAINT [password_reset_tokens_email_primary] PRIMARY KEY CLUSTERED 
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[personal_access_tokens]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[personal_access_tokens](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[tokenable_type] [nvarchar](255) NOT NULL,
	[tokenable_id] [bigint] NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[token] [nvarchar](64) NOT NULL,
	[abilities] [nvarchar](max) NULL,
	[last_used_at] [datetime] NULL,
	[expires_at] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_assy_setting_mcnt]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_assy_setting_mcnt](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime] NULL,
	[date_created] [datetime] NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[qr_marking_tool] [nvarchar](50) NULL,
	[item_check] [nvarchar](50) NULL,
	[standard_check] [nvarchar](50) NULL,
	[actual_check] [nvarchar](50) NULL,
	[judgment] [nvarchar](50) NULL,
	[status_check] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_assy_setting_mcsperoni]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_assy_setting_mcsperoni](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime] NULL,
	[date_created] [datetime] NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[qr_marking_tool] [nvarchar](50) NULL,
	[item_check] [nvarchar](50) NULL,
	[standard_check] [nvarchar](50) NULL,
	[actual_check] [nvarchar](50) NULL,
	[judgment] [nvarchar](50) NULL,
	[status_check] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_assy_setting_mczoller]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_assy_setting_mczoller](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime2](7) NULL,
	[date_created] [datetime2](7) NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[qr_marking_tool] [nvarchar](50) NULL,
	[item_check] [nvarchar](50) NULL,
	[standard_check] [nvarchar](50) NULL,
	[actual_check] [nvarchar](50) NULL,
	[judgment] [nvarchar](50) NULL,
	[status_check] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_diassy_tool]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_diassy_tool](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime2](7) NULL,
	[date_created] [datetime2](7) NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[qr_marking_tool] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_disassy_holder_washing]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_disassy_holder_washing](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime2](7) NULL,
	[date_created] [datetime2](7) NULL,
	[no_drawing_holder] [nvarchar](50) NULL,
	[qr_marking_holder] [nvarchar](50) NULL,
	[item_check] [nvarchar](50) NULL,
	[standard_check] [nvarchar](50) NULL,
	[actual_check] [nvarchar](50) NULL,
	[judgment] [nvarchar](50) NULL,
	[status_check] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_marking]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_marking](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime2](7) NULL,
	[date_created] [datetime2](7) NULL,
	[date_modify] [datetime2](7) NULL,
	[no_drawing] [nvarchar](50) NULL,
	[qr_marking] [nvarchar](50) NULL,
	[mode] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_preassy]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_preassy](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime] NULL,
	[date_created] [datetime] NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[no_drawing_holder] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_toolin]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_toolin](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime] NULL,
	[date_created] [datetime] NULL,
	[no_drawing] [nvarchar](50) NULL,
	[qr_marking] [nvarchar](50) NULL,
	[tool_lifetime_std] [int] NULL,
	[tool_lifetime_actual] [int] NULL,
	[pic] [nvarchar](50) NULL,
	[status] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_history_toolsupply]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_history_toolsupply](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime] NULL,
	[date_created] [datetime] NULL,
	[no_drawing] [nvarchar](50) NULL,
	[qr_marking] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
	[status] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_holder_position]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_holder_position](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime] NULL,
	[no_drawing] [nvarchar](50) NULL,
	[qr_marking] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[pos_id] [bigint] NULL,
	[pos_name] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_pos]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_pos](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime2](7) NULL,
	[date_modify] [datetime2](7) NULL,
	[pos_name] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_proses_marking_holder]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_proses_marking_holder](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime2](7) NULL,
	[nama_line] [nvarchar](50) NULL,
	[op_number] [nvarchar](50) NULL,
	[no_urut_tool] [nvarchar](50) NULL,
	[no_urut_holder] [nvarchar](50) NULL,
	[qr_holder_marking] [nvarchar](50) NULL,
	[no_drawing] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_proses_marking_tool]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_proses_marking_tool](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime] NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[tool_type] [nvarchar](50) NULL,
	[month] [nvarchar](50) NULL,
	[no_urut] [nvarchar](50) NULL,
	[qr_tool_marking] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_register_holder]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_register_holder](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime] NULL,
	[date_modify] [datetime] NULL,
	[no_drawing_holder] [nvarchar](50) NULL,
	[holder_name] [nvarchar](50) NULL,
	[holder_spec] [decimal](18, 0) NULL,
	[holder_diameter] [decimal](18, 0) NULL,
	[holder_lifetime_std] [int] NULL,
	[holder_frequency_std] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_register_line_op]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_register_line_op](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime2](7) NULL,
	[date_modify] [datetime2](7) NULL,
	[line] [nvarchar](50) NULL,
	[op] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_register_standard_check]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_register_standard_check](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime] NULL,
	[date_modify] [datetime] NULL,
	[pos_name] [nvarchar](50) NULL,
	[item_check] [nvarchar](50) NULL,
	[standard_check] [nvarchar](max) NULL,
	[remark] [nvarchar](50) NULL,
	[status] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_register_tool]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_register_tool](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime] NULL,
	[date_modify] [datetime] NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[tool_type] [nvarchar](50) NULL,
	[tool_spec] [decimal](18, 0) NULL,
	[tool_diameter] [decimal](18, 0) NULL,
	[tool_lifetime_std] [int] NULL,
	[tool_frequency_std] [int] NULL,
	[line] [nvarchar](50) NULL,
	[op] [nvarchar](50) NULL,
	[no_drawing_holder] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_regrinding_auto]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_regrinding_auto](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime2](7) NULL,
	[date_created] [datetime2](7) NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[qr_marking] [nvarchar](50) NULL,
	[item_check] [nvarchar](50) NULL,
	[standard_check] [nvarchar](50) NULL,
	[actual_check] [nvarchar](50) NULL,
	[judgment] [nvarchar](50) NULL,
	[status_check] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_regrinding_manual]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_regrinding_manual](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_scan] [datetime2](7) NULL,
	[date_created] [datetime2](7) NULL,
	[no_drawing_tool] [nvarchar](50) NULL,
	[qr_marking] [nvarchar](50) NULL,
	[item_check] [nvarchar](50) NULL,
	[standard_check] [nvarchar](50) NULL,
	[actual_check] [nvarchar](50) NULL,
	[judgment] [nvarchar](50) NULL,
	[status_check] [nvarchar](50) NULL,
	[pic] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_tool_position]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_tool_position](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime] NULL,
	[no_drawing] [nvarchar](50) NULL,
	[qr_marking] [nvarchar](50) NULL,
	[part_name] [nvarchar](50) NULL,
	[pos_id] [int] NULL,
	[pos_name] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbl_user_account]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_user_account](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[date_created] [datetime2](7) NULL,
	[date_modify] [datetime2](7) NULL,
	[username] [nvarchar](50) NULL,
	[npk] [int] NULL,
	[pos] [nvarchar](50) NULL,
	[role] [nvarchar](50) NULL,
	[password] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 18/07/2023 09:59:21 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](255) NOT NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [failed_jobs_uuid_unique]    Script Date: 18/07/2023 09:59:21 ******/
CREATE UNIQUE NONCLUSTERED INDEX [failed_jobs_uuid_unique] ON [dbo].[failed_jobs]
(
	[uuid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [personal_access_tokens_token_unique]    Script Date: 18/07/2023 09:59:21 ******/
CREATE UNIQUE NONCLUSTERED INDEX [personal_access_tokens_token_unique] ON [dbo].[personal_access_tokens]
(
	[token] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [personal_access_tokens_tokenable_type_tokenable_id_index]    Script Date: 18/07/2023 09:59:21 ******/
CREATE NONCLUSTERED INDEX [personal_access_tokens_tokenable_type_tokenable_id_index] ON [dbo].[personal_access_tokens]
(
	[tokenable_type] ASC,
	[tokenable_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_email_unique]    Script Date: 18/07/2023 09:59:21 ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_email_unique] ON [dbo].[users]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
ALTER TABLE [dbo].[failed_jobs] ADD  DEFAULT (getdate()) FOR [failed_at]
GO
ALTER TABLE [dbo].[tbl_holder_position]  WITH CHECK ADD  CONSTRAINT [tbl_holder_position_pos_id_foreign] FOREIGN KEY([pos_id])
REFERENCES [dbo].[tbl_pos] ([id])
ON DELETE SET NULL
GO
ALTER TABLE [dbo].[tbl_holder_position] CHECK CONSTRAINT [tbl_holder_position_pos_id_foreign]
GO
USE [master]
GO
ALTER DATABASE [traceability] SET  READ_WRITE 
GO
